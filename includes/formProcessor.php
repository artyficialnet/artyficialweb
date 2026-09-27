<?php
declare(strict_types=1);

/**
 * formProcessor.php — Artyficial Technologies
 * Procesa el formulario de contacto y envía el correo usando SOLO funciones
 * nativas de PHP (stream_socket_client para SMTP y mail() como respaldo).
 *
 * SIN librerías de terceros: no hay Composer, ni Mailgun SDK, ni vendor/.
 *
 * Configuración (variables de entorno en Coolify):
 *   SMTP_HOST      host del servidor SMTP            (ej. smtp.tuproveedor.com)
 *   SMTP_PORT      puerto                            (587 por defecto)
 *   SMTP_SECURE    tls | ssl | none                  (tls por defecto; ssl = TLS implícito p. ej. 465)
 *   SMTP_USER      usuario SMTP
 *   SMTP_PASS      contraseña SMTP (también acepta SMTP_PASSWORD)
 *   MAIL_FROM      remitente                         (no-reply@artyficial.net)
 *   MAIL_FROM_NAME nombre del remitente              (Artyficial Technologies)
 *   MAIL_TO        destinatario del formulario       (info@artyficial.net)
 */

header('Content-Type: application/json; charset=utf-8');

/* ----------------------------- utilidades ------------------------------ */

function respond(bool $ok, array $extra = [], int $code = 200): void
{
    http_response_code($code);
    echo json_encode(array_merge(['success' => $ok], $extra), JSON_UNESCAPED_UNICODE);
    exit;
}

function envv(string $key, ?string $default = null): ?string
{
    $v = getenv($key);
    if ($v === false || $v === '') {
        $v = $_SERVER[$key] ?? $_ENV[$key] ?? null;
    }
    return ($v === '' || $v === null) ? $default : (string) $v;
}

/** Limpia una línea: evita inyección de cabeceras y limita longitud. */
function cleanLine(string $value, int $max = 300): string
{
    $value = str_replace(["%0d", "%0a", "\r", "\n"], ' ', $value);
    return trim(mb_substr($value, 0, $max));
}

function addressName(string $name): string
{
    if (preg_match('/[^\x20-\x7E]/', $name)) {
        return mb_encode_mimeheader($name, 'UTF-8', 'B', "\r\n");
    }
    return '"' . str_replace('"', '', $name) . '"';
}

/* ------------------------------ SMTP nativo ---------------------------- */

function smtpExpect($fp, array $codes): string
{
    $data = '';
    while (!feof($fp)) {
        $line = fgets($fp, 2000);
        if ($line === false) {
            break;
        }
        $data .= $line;
        if (strlen($line) >= 4 && $line[3] === ' ') {
            break; // última línea de una respuesta multilínea
        }
    }
    $code = (int) substr($data, 0, 3);
    if (!in_array($code, $codes, true)) {
        throw new RuntimeException('SMTP ' . $code . ': ' . trim($data));
    }
    return $data;
}

function smtpCmd($fp, string $cmd, array $codes): string
{
    fwrite($fp, $cmd . "\r\n");
    return smtpExpect($fp, $codes);
}

/**
 * Envía un mensaje ya formado (cabeceras + cuerpo) vía SMTP usando sockets nativos.
 */
function smtpSend(array $c, string $headers, string $body, string $envelopeFrom, string $envelopeTo): void
{
    $secure    = strtolower($c['secure'] ?? 'tls');
    $transport = ($secure === 'ssl') ? 'ssl://' : 'tcp://';

    $fp = @stream_socket_client(
        $transport . $c['host'] . ':' . (int) $c['port'],
        $errno,
        $errstr,
        20
    );
    if (!$fp) {
        throw new RuntimeException('No se pudo conectar al SMTP: ' . $errstr);
    }
    stream_set_timeout($fp, 20);

    smtpExpect($fp, [220]);

    $ehloHost = ltrim(strrchr($envelopeFrom, '@') ?: '', '@');
    if ($ehloHost === '') {
        $ehloHost = 'localhost';
    }
    smtpCmd($fp, 'EHLO ' . $ehloHost, [250]);

    if ($secure === 'tls') {
        smtpCmd($fp, 'STARTTLS', [220]);
        if (!stream_socket_enable_crypto($fp, true, STREAM_CRYPTO_METHOD_TLS_CLIENT)) {
            throw new RuntimeException('Negociación STARTTLS fallida');
        }
        smtpCmd($fp, 'EHLO ' . $ehloHost, [250]);
    }

    if (!empty($c['user'])) {
        smtpCmd($fp, 'AUTH LOGIN', [334]);
        smtpCmd($fp, base64_encode($c['user']), [334]);
        smtpCmd($fp, base64_encode((string) $c['pass']), [235]);
    }

    smtpCmd($fp, 'MAIL FROM:<' . $envelopeFrom . '>', [250]);
    smtpCmd($fp, 'RCPT TO:<' . $envelopeTo . '>', [250, 251]);
    smtpCmd($fp, 'DATA', [354]);

    $data = $headers . "\r\n" . $body;
    $data = preg_replace('/^\./m', '..', $data); // dot-stuffing
    fwrite($fp, $data . "\r\n.\r\n");
    smtpExpect($fp, [250]);

    @fwrite($fp, "QUIT\r\n");
    @fclose($fp);
}

/* ------------------------------- entrada ------------------------------- */

if (($_SERVER['REQUEST_METHOD'] ?? 'GET') !== 'POST') {
    respond(false, ['error' => 'Método no permitido'], 405);
}

$name    = cleanLine((string) ($_POST['name'] ?? ''), 120);
$email   = cleanLine((string) ($_POST['email'] ?? ''), 320);
$formSub = cleanLine((string) ($_POST['subject'] ?? ''), 200);
$message = trim((string) ($_POST['message'] ?? ''));
$message = str_replace(["\r\n", "\r"], "\n", $message);

if ($name === '' || $email === '' || $message === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    respond(false, ['error' => 'Datos del formulario inválidos'], 400);
}

$fromName = envv('MAIL_FROM_NAME', 'Artyficial Technologies');
$fromAddr = envv('MAIL_FROM', 'no-reply@artyficial.net');
$toAddr   = envv('MAIL_TO', 'info@artyficial.net');
$subject  = 'Contacto Web AyF - ' . ($formSub !== '' ? $formSub : 'Nuevo mensaje');

$textBody = "Contacto desde el sitio de Artyficial\n"
    . "Nombre:  {$name}\n"
    . "Email:   {$email}\n"
    . "Asunto:  {$formSub}\n"
    . "Mensaje:\n{$message}\n";

$safe = static fn(string $s): string => htmlspecialchars($s, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
$htmlBody = "<h2>Contacto desde el sitio de Artyficial</h2>"
    . "<p><strong>Nombre:</strong> {$safe($name)}<br>"
    . "<strong>Email:</strong> {$safe($email)}<br>"
    . "<strong>Asunto:</strong> {$safe($formSub)}</p>"
    . '<p><strong>Mensaje:</strong></p>'
    . '<pre style="font-family:inherit;white-space:pre-wrap">' . $safe($message) . '</pre>';

/* Mensaje MIME multipart/alternative (texto + HTML) */
$boundary = '=_ayf_' . bin2hex(random_bytes(8));
$body = "--{$boundary}\r\n"
    . "Content-Type: text/plain; charset=UTF-8\r\n"
    . "Content-Transfer-Encoding: base64\r\n\r\n"
    . chunk_split(base64_encode($textBody)) . "\r\n"
    . "--{$boundary}\r\n"
    . "Content-Type: text/html; charset=UTF-8\r\n"
    . "Content-Transfer-Encoding: base64\r\n\r\n"
    . chunk_split(base64_encode($htmlBody)) . "\r\n"
    . "--{$boundary}--\r\n";

$headers = [
    'From: ' . addressName($fromName) . ' <' . $fromAddr . '>',
    'To: <' . $toAddr . '>',
    'Reply-To: <' . $email . '>',
    'Subject: ' . mb_encode_mimeheader($subject, 'UTF-8', 'B', "\r\n"),
    'Date: ' . date('r'),
    'MIME-Version: 1.0',
    'Content-Type: multipart/alternative; boundary="' . $boundary . '"',
];

/* -------------------------------- envío -------------------------------- */

try {
    $smtpHost = envv('SMTP_HOST');

    if ($smtpHost !== null) {
        smtpSend(
            [
                'host'   => $smtpHost,
                'port'   => envv('SMTP_PORT', '587'),
                'secure' => envv('SMTP_SECURE', 'tls'),
                'user'   => envv('SMTP_USER', ''),
                'pass'   => envv('SMTP_PASS', envv('SMTP_PASSWORD', '')),
            ],
            implode("\r\n", $headers),
            $body,
            $fromAddr,
            $toAddr
        );
    } else {
        /* Respaldo: función nativa mail() (requiere MTA/sendmail en el contenedor) */
        $fallbackHeaders = implode("\r\n", [
            'From: ' . addressName($fromName) . ' <' . $fromAddr . '>',
            'Reply-To: <' . $email . '>',
            'MIME-Version: 1.0',
            'Content-Type: text/plain; charset=UTF-8',
        ]);
        if (!mail($toAddr, $subject, $textBody, $fallbackHeaders)) {
            throw new RuntimeException('mail() no disponible: define SMTP_HOST o instala un MTA');
        }
    }

    respond(true, ['messageId' => bin2hex(random_bytes(12))]);
} catch (Throwable $e) {
    error_log('formProcessor: ' . $e->getMessage());
    respond(false, ['error' => 'No se pudo enviar el mensaje. Inténtalo más tarde.'], 500);
}
