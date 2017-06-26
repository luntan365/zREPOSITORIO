<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <form class="" action="" method="post" enctype="multipart/form-data">
      <input type="file" name="imagens[]" multiple="multiple">
      <input type="submit" name="enviar" value="Enviar">
    </form>

  </body>
</html>

<?php

  if ( isset($_POST['enviar'])) {
    $diretorios = $_FILES['imagens']['tmp_name'];
    foreach ($diretorios as $i => $v) {
      $destino = 'img/'.$i.'.jpeg';
      move_uploaded_file ($v , $destino);
      echo '<img src="'.$destino.'"> <br/>';
    }
  }

?>
