<?php
function autoload(){
  $diretorio = __DIR__;
 if (is_dir($diretorio)) {
   $ponteiro = opendir($diretorio);
   while ($item = readdir($ponteiro)) {
     if ($item != '.' && $item != '..' && $item != 'autoload.php') {
         require_once $diretorio.'/'.$item;
     }
   }
   closedir($ponteiro);
 }
}
autoload();
?>
