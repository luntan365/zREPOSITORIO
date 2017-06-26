<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>PHP</title>
  </head>
  <body>

    <form method="post">
      <label for="idade"> Idade </label>
      <input type="text" name="idade" required autofocus>
      <input type="submit">
    </form>

    <?php

      if (isset($_POST["idade"])) {
          echo $_POST["idade"];
          $idade = $_POST["idade"];
          if ($idade >= 18 and $idade < 60) {
            echo " Idade de adulto";
          } elseif( $idade < 18 ){
            echo " Joven";
          } else {
            echo " Idoso";
          }
      }

     ?>

  </body>
</html>
