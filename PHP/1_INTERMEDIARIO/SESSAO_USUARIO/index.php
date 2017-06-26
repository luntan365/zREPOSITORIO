<?php
  error_reporting(E_ALL ^ E_NOTICE);
  session_start();

  switch ($_POST['operacao']) {
    
    case 'deslogar':  session_destroy(); include_once('login.php');  break;

    case 'logar':
      if ($_POST['login'] == 'root' && $_POST['senha'] == 'usbw')
          $_SESSION['usuario'] = $_POST['login'];
          //salvar ID usuario para salvar suas alteraçoes no DB

      if (isset($_SESSION['usuario'])) {
        include_once('conteudo.php');
      } else {
        echo "<h1>Usuário ou senha inválido.<h1>";
        include_once('login.php');
      }
      break;

    default: include_once('login.php'); break;
  }


  ?>
