<?php
if ($_SERVER['REQUEST_METHOD']=='POST') {

  require_once 'PHPMailer.php';

  $assunto = $_POST['assunto'];
  $mensagem = $_POST['mensagem'];
  $destinatario = $_POST['email'];
  $nome_remetente = "PetAdote";
  $remetente = "petadote@petadote.com.br";
  $email_alternativo_para_receber_respostas = "petadoteprojeto@gmail.com";

  $host_servidor_smtp = "send.one.com";
  $usuario_email_servidor_smtp = "petadote@petadote.com.br";
  $senha_email_servidor_smtp = "Socorro88**";
  $porta_servidor_smtp = "465";
  $smtp_secure = "ssl";

  $mail = new PHPMailer();
  # $mail->SMTPDebug = 0; // 0 nao mostra erros, 2 mostra todos erros
  $mail->SetLanguage("br", "phpmailer/language"); // ajusto a lingua a ser utilizadda

  $mail->Port = $porta_servidor_smtp; // ajusto a porta de smt a ser utilizada. Neste caso, a 587 que o GMail utiliza
  $mail->SMTPSecure = $smtp_secure; // ajusto o tipo de comunicação a ser utilizada, no caso, a TLS do GMail
  $mail->IsSMTP(); // ajusto o email para utilizar protocolo SMTP
  $mail->SMTPAuth = true;  // ativo a autenticação SMTP, no caso do GMail, é necessário
  $mail->Host = $host_servidor_smtp;  // especifico o endereço do servidor smtp do GMail
  $mail->Username = $usuario_email_servidor_smtp;  // Usuário SMTP do GMail
  $mail->Password = $senha_email_servidor_smtp; // Senha do usuário SMTP do GMail

  $mail->addReplyTo($email_alternativo_para_receber_respostas, 'Resposta de mensagens do PetAdote'); // endereço para qual o meail vai ser respondido, deve ser chamado antes das funções setFrom() e addAddress()
  $mail->SetFrom($remetente, htmlentities($nome_remetente)); // Email de quem envia o email, Nome de quem envia o email
  $mail->AddAddress($destinatario, "dejota"); // Endereço e nome de quem vai receber o email, o nome é opcional

  # $mail->addCC('cc@example.com'); // erve para indicar destinatários que devem receber uma cópia da mensagem. Funcionalmente é equivalente ao campo To:, mas dá a indicação ao destinatário da mensagem de que esta é um duplicado de uma mensagem enviada a outrém.
  # $mail->addBCC('bcc@example.com'); // permite enviar uma cópia da mensagem a destinatários não mencionados nos campos To: e Cc: mas sem que nada na mensagem registe o envio da cópia.

  $mail->IsHTML(true);  // ajusto envio do email no formato HTML
  $mail->WordWrap = 50;   // quebra linha sempre que uma linha atingir 50 caracteres
  $mail->Subject = htmlentities($assunto); // Aqui colocar o assunto do email
  $mail->Body = htmlentities($mensagem); // mensagem com html, aqui o corpo do email para usuarios que tem a opção text/html do seu webmail ou cliente de email ativada
  $mail->AltBody = htmlentities($mensagem); // mensagem sem html, aqui o corpo do email para usuarios que tem a opção text/html do seu webmail ou cliente de email desativada
  # $mail->AddAttachment("/var/tmp/file.tar.gz");   // adc arquivo anexo. *opcional*
  # $mail->AddAttachment("/tmp/image.jpg", "new.jpg");   // adc outro arquivo anexo com nome (opcional). *opcional*

  if($mail->Send()){
    echo "E-mail enviado com sucesso. <p>";
  }	else {
    echo "Mensagem não pode ser enviada. <p>";
    echo "Erro: " . $mail->ErrorInfo;
  }

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
      <input type="nome" name="nome" id="nome" value="Dejota">
      <br><br>
      <label for="email">Para e-mail</label>
      <br>
      <input type="email" name="email" id="email" value="djxpgs@gmail.com">
      <br><br>
      <label for="assunto">assunto</label>
      <br>
      <input type="text" name="assunto" id="assunto" value="ssssss">
      <br><br>
      <label for="mensagem">mensagem</label>
      <br>
      <textarea name="mensagem"  id="mensagem" rows="10" cols="80">sssssssssssss</textarea>
      <br><br><br>
      <button type="submit" name="button">Enviar</button>

    </form>


  </body>
</html>
