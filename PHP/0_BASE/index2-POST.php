<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>PHP</title>
  </head>
  <body>

    <form method="post">
      <label for="numero">Nuemro</label>
      <input type="text" name="numero" required autofocus>
      <input type="submit">
    </form>

    <?php

      if (isset($_POST["numero"])) {
          echo $_POST["numero"];
          if ($_POST["numero"] % 2 == 0) {
            echo " PAR";
          } else {
            echo " IMPAR";
          }
      }

     ?>

  </body>
</html>
