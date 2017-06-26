<?php

function salvarDB($campos, $diretorioIMG='img/'){
  $camposSQL = "";
  $valoresSQL = "";

  if (is_array($campos) && count($campos) > 0) {

    foreach ($campos as $value) {

      if (isset($_POST[$value]) && $_POST[$value]!='') {
        if ($camposSQL!="") {$camposSQL .= ", ";}
        if ($valoresSQL!="") {$valoresSQL .= ", ";}
        $camposSQL .= $value;
        $valoresSQL .= "'$_POST[$value]'";

      } else if ($_FILES[$value]['name'] != '' && $_FILES[$value]['error'] == 0) {
        if ($camposSQL!="") {$camposSQL .= ", ";}
        if ($valoresSQL!="") {$valoresSQL .= ", ";}
        include_once("uploadImagem.php");
        $imagem = uploadImagem($value, $diretorioIMG);
        $camposSQL .= $value;
        $valoresSQL .= "'$imagem'";
      }

    } // fim do foreach

    if ($camposSQL != "" && $valoresSQL != "") {
      $sql = "insert into contatos ($camposSQL)  values ($valoresSQL);";
      echo "$sql <br>";
      include_once("db.php");
      $resultado = executarSQL($sql);
      return true;
    } else {
      return false;
    }

  }//fim do if

}// fim da funcao


?>
