<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <a href="index19-2.php">Ir para pagina</a>
    <?php

    //Sessao onde guardo valores e variavel para usar em todo site;

    //iniciar sessao
    session_start();

    //Gardar Valor na seção
    $_SESSION['nome']="Dejota";
    echo $_SESSION['nome'];

    //terminar sessao
    //session_destroy();

    ?>

  </body>
</html>
