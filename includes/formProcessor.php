<?php
require '../vendor/autoload.php';

#Mailgun.org LideraMe account
$DOMAIN = 'sandbox6a2c1e5633c94878be001b9d800bc08d.mailgun.org';
$API_KEY = 'key-ba38b3c09adc02e478c6a5d788c6e68a';

use Mailgun\Mailgun;
use Mailgun\HttpClient\HttpClientConfigurator;

$httpConfig = new HttpClientConfigurator();
$httpConfig->setApiKey($API_KEY);
$mgClient = new Mailgun($httpConfig);

$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];
$fullMessage = '';
$toInboxs = 'asael2@gmail.com';
$replyTo = 'artyficialsas@gmail.com';
$from = 'Artyficial Technologies <info@artyficial.net>';
$fullMessage = "TXT contact AyF Website: " .
    " ::: Name: " . $name .
    " ::: Email: " . $email .
    " ::: Subject: " . $subject .
    " ::: Message: " . $message;

$htmlMessage = "Contact from Artificial's Website: " .
    " <br> Name: " . $name .
    " <br> Email: " . $email .
    " <br> Subject: " . $subject .
    " <br> Message: " . $message;

$emailConfig = [
    'from'    => $from,
    'to'      => $toInboxs,
    'subject' => $subject,
    'text'    => $fullMessage,
    'html'    => $htmlMessage,
    'h:Reply-To'  => $replyTo
];

# Send the email.
$result = $mgClient->messages()->send($DOMAIN, $emailConfig);
$messageId = $result->getId();

# Response for Ajax
if ($messageId) {
    header('Content-Type: application/json');
    echo json_encode(['success' => true, 'messageId' => $messageId]);
} else {
    # Error response
    header('Content-Type: application/json');
    echo json_encode(['success' => false, 'error' => 'Invalid request']);
}
