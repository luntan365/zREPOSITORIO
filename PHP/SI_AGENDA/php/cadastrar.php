<?php

$campos = ['nome', 'email', 'sexo', 'nascimento', 'telefone', 'pais', 'imagem'];

include_once("php/db/salvarDB.php");
if (salvarDB($campos, 'img/')) {
  echo "Salvo com sucesso.<br>";
} else {
  echo "Nenhum registro foi salvo.<br>";
}


?>
