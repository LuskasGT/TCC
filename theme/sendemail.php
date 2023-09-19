<?php
require 'lib/vendor/autoload.php'; // If you're using Composer (recommended)
// Comment out the above line if not using Composer
// require("<PATH TO>/sendgrid-php.php");
// If not using Composer, uncomment the above line and
// download sendgrid-php.zip from the latest release here,
// replacing <PATH TO> with the path to the sendgrid-php.php file,
// which is included in the download:
// https://github.com/sendgrid/sendgrid-php/releases

$email = new \SendGrid\Mail\Mail(); 
$email->setFrom("lucas.g.theodooro@gmail.com", "Lucas TCC");
$email->setSubject("Adoção de animais - Lucio Pelizer");
$email->addTo("lucas.g.theodooro@gmail.com", "Lucas TCC");
$email->addContent("text/plain", "Enviado com sucesso(acredito)");
$email->addContent(
    "text/html", "<strong>Enviado com sucesso(acredito)</strong>"
);
$sendgrid = new \SendGrid(getenv('SENDGRID_API_KEY'));
try {
    $response = $sendgrid->send($email);
    print $response->statusCode() . "\n";
    print_r($response->headers());
    print $response->body() . "\n";
} catch (Exception $e) {
    echo 'Caught exception: '. $e->getMessage() ."\n";
}