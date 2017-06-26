<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>PHP</title>
  </head>
  <body>

    <form method="post">
      <label for="caixa-texto"> Texto </label>
      <input type="text" name="caixa-texto" required autofocus>
      <input type="submit">
    </form>

    <?php
      if (isset($_POST["caixa-texto"])) {
          echo $_POST["caixa-texto"];
      }
     ?>

  </body>
</html>
