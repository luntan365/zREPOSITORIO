<?php

$sql = "select * from contatos";
include_once("php/db/db.php");
$resultado = executarSQL($sql);

foreach ($resultado as $value) {
  foreach ($value as $value2) {
    echo "$value2 ";
  }
  echo "<br>";
}



?>
