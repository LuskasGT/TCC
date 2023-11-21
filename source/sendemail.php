<?php
require 'lib/vendor/autoload.php'; // If you're using Composer (recommended)

$email = new \SendGrid\Mail\Mail();
$email->setFrom("lucas.g.theodooro@gmail.com", "Adoção de Animas");
$email->setSubject("Adoção de animais - Fale Conosco");
$email->addTo("lucas.g.theodooro@gmail.com", "Lucas TCC");

$email->addContent(
    "text/html",
    "<strong>Fale Conosco</strong><br><br>" .
    "<strong>Nome:</strong> " . $_POST['nome'] . "<br>" .
    "<strong>Email:</strong> " . $_POST['email'] . "<br>" .
    "<strong>Mensagem:</strong> " . $_POST['mensagem']
);

$sendgrid = new \SendGrid('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');
                                
try {
    $response = $sendgrid->send($email);
    print $response->statusCode() . "\n";
    print_r($response->headers());
    print $response->body() . "\n";

} catch (Exception $e) {
    echo 'Caught exception: '. $e->getMessage() . "\n";
}
