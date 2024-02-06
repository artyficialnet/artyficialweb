<?php
require '../vendor/autoload.php';

#Mailgun.org Artyficial.net Domain
$DOMAIN = 'artyficial.net';
$API_KEY = '26de353143842619149b9651ff2c9f8f-8c90f339-b043c6ca';

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
$toInboxs = 'info@artyficial.net';
$replyTo = 'info@artyficial.net';
$from = 'Artyficial Technologies <info@artyficial.net>';
$fullMessage = "TXT contact AyF Website: " .
    " ::: Name: " . $name .
    " ::: Email: " . $email .
    " ::: Subject: " . $subject .
    " ::: Message: " . $message;

$htmlMessage = "Contact from Artyficial's Website: " .
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
