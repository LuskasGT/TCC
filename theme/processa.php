<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pagina = $_SERVER['HTTP_REFERER']; // Identifica automaticamente a página de origem
    $nome = $_POST["nome"];
    $email = $_POST["email"];// o email e o nome tem de qualquer maneira nos dois forms então nn faz sentido deixar dentro da verificação

// Fazendo um comparação se for fale-conosco ele vai enviar um email com algumas informações
// se não for ele, ele via enviar outras informações
    if($pagina == "http://localhost/tcc/theme/fale-conosco.html"){
        
        $mensagem = $_POST["mensagem"];

        // Configurações para o email
        $destinatario = "lucas.g.theodooro@gmail.com"; 
        $assunto = "Mensagem da página $pagina";

        // Conteúdo do email
        $corpo = "Página de Origem: $pagina\r\n
        Nome: $nome\r\n
        Email: $email\r\n
        Mensagem:\r\n$mensagem";

        // Configuração dos cabeçalhos do email
        $cabecalhos = "From: $email";


       
    }else{// Caso seja algum forms de adoção 

        $telefone = $_POST["telefone"];
        $numero = $_POST["numero"];
        $endereco = $_POST["endereco"];
        $apartamento = $_POST["apartamento"];

        // Configurações para o email
        $destinatario = "lucas.g.theodooro@gmail.com"; 
        $assunto = "Adoção de animal da página $pagina";

        // Conteúdo do email
        $corpo = "Página de Origem: $pagina\r\n
        Nome: $nome\r\n
        Email: $email\r\n
        Telefone: $telefone\r\n
        Numero: $numero\r\n
        Endereco: $endereco\r\n
        Apartamento: $apartamento
        Mensagem: Adoção de animal";

        // Configuração dos cabeçalhos do email
        $cabecalhos = "From: $email";
    }


    }
    // Envie o email
    if (mail($destinatario, $assunto, $corpo, $cabecalhos)) {
        echo "Mensagem enviada com sucesso!";
    } else {
        echo "Erro ao enviar a mensagem.";
    }
?>
