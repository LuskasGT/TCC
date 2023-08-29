<?php 
if (issets($_POST['email'] && !empty($_POST["email"]))){

$email = addslashes($_POST["email"]);
$nome = addslashes($_POST["nome"]);
$endereco = addslashes($_POST["endereco"]);
$telefone = addslashes($_POST["telefone"]);

$to = "lucas.g.theodooro@gmail.com";
$subject = "Contato para adoção";
$body = "email: ".$email. "\r\n".
        "nome: ".$nome. "\r\n".
        "endereco: ".$endereco. "\r\n".
        "telefone: ".$endereco;

$header = "From: lucas.g.theodooro@gmail.com"."\r\n".
 "Reply-To:" $email."\r\n".
 "X=Mailer:PHP/".phpversion();

 if(mail($to,$subject,$body,$header)){
    echo("Email enviado com sucesso");
 }else{
    echo("Email não foi enviado");
 }


}
?>