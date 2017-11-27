<?php
session_start();
require_once 'config.php';

// if (isset($_SESSION['usuario']) && isset($_SESSION['time']) && (time()-$_SESSION['time'])>1800){
//   session_regenerate_id(true);  session_unset();  session_destroy();
//   header("Location: ".DOMINIO);
// }
// $_SESSION['time'] = time();

$url_route = new URL;

if ($url_route->tipo() == 'web'){
  require_once DIRETORIO_RAIZ.'/web/header.php';
  require_once $url_route->url();
  require_once DIRETORIO_RAIZ.'/web/footer.php';
}
else if ($url_route->tipo() == 'action'){
  require_once $url_route->url();
}


?>
