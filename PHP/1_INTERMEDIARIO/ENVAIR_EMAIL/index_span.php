<?php
if ($_SERVER['REQUEST_METHOD']=='POST') {


  function enviaEmail($nome, $email_servidor, $de, $para, $assunto, $mensagem) {
      $headers = "From: $email_servidor" . "\r\n";
                 "To: $nome <$de>" . "\r\n";
                 "Reply-To: $nome <$de>" . "\r\n";
                 "X-Mailer: PHP/" . phpversion() . "\r\n";
      $headers .= "MIME-Version: 1.0" . "\r\n";
      $headers .= "Content-Type: text/html; charset=ISO-8859-1" . "\r\n";

    mail($para, $assunto, nl2br($mensagem), $headers);
  }

  $nome = $_POST['nome'];
  $email_servidor = "petadote@petadote.com.br";
  $de = "petadoteprojeto@gmail.com";
  $para = $_POST['email'];
  $assunto = $_POST['assunto'];
  $mensagem = $_POST['mensagem'];

  enviaEmail($nome, $email_servidor, $de, $para, $assunto, $mensagem);

}
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <title>Enviar email</title>
  </head>
  <body>

    <form class="" action="" method="post">

      <label for="nome">Nome</label>
      <br>
      <input type="nome" name="nome" id="nome" value="">
      <br><br>
      <label for="email">Para e-mail</label>
      <br>
      <input type="email" name="email" id="email" value="">
      <br><br>
      <label for="assunto">assunto</label>
      <br>
      <input type="text" name="assunto" id="assunto" value="">
      <br><br>
      <label for="mensagem">mensagem</label>
      <br>
      <textarea name="mensagem"  id="mensagem" rows="10" cols="80"></textarea>
      <br><br><br>
      <button type="submit" name="button">Enviar</button>

    </form>


  </body>
</html>
