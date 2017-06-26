<?php
session_start();
require_once 'config.php';

if (isset($_SESSION['usuario']) && isset($_SESSION['time']) && (time()-$_SESSION['time'])>600):
  session_regenerate_id(true);  session_unset();  session_destroy();
  header("Location: ".DOMINIO);
endif;
$_SESSION['time'] = time();

$_SESSION['CSRF'] = isset($_SESSION['CSRF']) ? $_SESSION['CSRF'] : hash('sha512', rand(100,1000));

require_once 'header.php';
$urlamigavel = new URL('paginas');
require_once $urlamigavel;
require_once 'footer.php';
?>
