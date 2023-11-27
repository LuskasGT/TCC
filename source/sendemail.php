<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <title>Instituto Meu Pet</title>

  <!-- mobile responsive meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- theme meta -->
  <meta name="theme-name" content="agen" />

  <!-- Bootstrap -->
  <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css">
  <!-- slick slider -->
  <link rel="stylesheet" href="plugins/slick/slick.css">
  <!-- themefy-icon -->
  <link rel="stylesheet" href="plugins/themify-icons/themify-icons.css">
  <!-- venobox css -->
  <link rel="stylesheet" href="plugins/venobox/venobox.css">
  <!-- card slider -->
  <link rel="stylesheet" href="plugins/card-slider/css/style.css">
  <!-- Your custom style -->
  <link href="css/style.css" rel="stylesheet">

  <!-- Favicon -->
  <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
  <link rel="icon" href="images/favicon.ico" type="image/x-icon">
</head>
<body>

  <header class="navigation fixed-top">
    <nav class="navbar navbar-expand-lg navbar-dark">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
        aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse text-center" id="navigation">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.html">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="fale-conosco.html">Fale conosco</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="adocao.html">Adote hoje</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="PorqueAdotar.html">Porque Adotar</a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- banner -->
  <section id="background-banner" class="banner img-fluid bg-cover position-relative d-flex justify-content-center align-items-center"
    data-background="images/backgrounds/banner.png" style =" height: 630px;">
  </section>
  <!-- /banner -->

  <?php
  require 'lib/vendor/autoload.php'; // If you're using Composer (recommended)

  // Verifica se o formulário foi enviado
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // Verifica se os dados do formulário estão presentes
      if (isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['mensagem'])) {

          // Configuração do e-mail
          $email = new \SendGrid\Mail\Mail();
          $email->setFrom("lucas.g.theodooro@gmail.com", "Adoção de Animais");
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
              // Tenta enviar o e-mail
              $response = $sendgrid->send($email);

              // Exibe a mensagem de sucesso
              echo "Obrigado por nos contatar";

          } catch (\Exception $e) {
              // Esconde o erro e exibe a mensagem personalizada
              echo "Obrigado por nos contatar";
          }
      } else {
          // Caso algum dado do formulário esteja faltando
          echo "Obrigado por nos contatar";
      }
  } else {
      // Caso o formulário não tenha sido enviado por POST
      echo "Obrigado por nos contatar";
  }
  ?>

  <!-- footer -->
 
<footer class="bg-secondary position-relative">

<div class="section">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-12 lg-12 col-12">
        <h4 class="text-white mb-10 lg-10 ">Esse site foi feito a partir de um projeto de trabalho de conclusão de curso da escola Etec João Maria Stevantto do ano de 2023</h4>
      </div>
    </div>
  </div>
</div>
<div class="pb-4">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-6 text-center text-md-left">
        <p class="text-light mb-0">Copyright &copy; 2023<a class="text-gradient-primary"
            href="https://www.etecitapira.com.br/">Etec</a>
        </p>
      </div>
      <div class="col-md-6">
        <ul class="list-inline text-md-right text-center">
          <li class="list-inline-item"><a class="d-block p-3 text-white"
              href="https://www.instagram.com/institutomeupet/?igshid=MzRlODBiNWFlZA%3D%3D"><i
                class="ti-instagram"></i></a>
          </li>
          <li class="list-inline-item"><a class="d-block p-3 text-white" href="https://github.com/LuskasGT/TCC"><i
                class="ti-github"></i></a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
</footer>
<!-- /footer -->


  <!-- jQuery e outros scripts -->
  <script src="plugins/jQuery/jquery.min.js"></script>
  <!-- Bootstrap JS -->
  <script src="plugins/bootstrap/bootstrap.min.js"></script>
  <!-- slick slider -->
  <script src="plugins/slick/slick.min.js"></script>
  <!-- venobox -->
  <script src="plugins/venobox/venobox.min.js"></script>
  <!-- shuffle -->
  <script src="plugins/shuffle/shuffle.min.js"></script>
