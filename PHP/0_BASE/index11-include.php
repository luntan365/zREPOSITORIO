<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>PHP</title>
  </head>
  <body>

    <?php

    #importa outro arquivo

    #se nao acha, mostra excerção e pára a aplicação
    require('index8.php');

    #se nao acha, mostra excerção e continua a aplicação
    include('index9.php');

    #impede do arquivo ser importado duas vezes e bug tudo
    require_once('index8.php');
    include_once('index9.php');





     ?>
  </body>
</html>
