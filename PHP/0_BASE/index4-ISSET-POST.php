<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>PHP</title>
  </head>
  <body>

    <form method="post">
      <label for="login"> Login </label>
      <input type="text" name="login" required autofocus >
      <br>
      <label for="senha"> Senha </label>
      <input type="password" name="senha" required >
      <br>
      <input type="submit">
    </form>

    <?php

      if (isset($_POST["login"]) && isset($_POST["senha"])) {
        if ($_POST["login"] == "login" && $_POST["senha"] == "senha") {
          echo "Logado";
        } else {
          echo "Login ou  senha Inválidos";
        }
      }

     ?>

  </body>
</html>
