<?php

    function executarSQL(&$sql){
      $host="localhost";
      $user="root";
      $pass="";
      $dbname="agenda";
      $conexao = mysqli_connect($host, $user, $pass, $dbname)
      or die('Erro ao conectar ao banco de dados <br>');
      mysqli_set_charset($conexao,"utf8");
      $resultado = mysqli_query($conexao, $sql)
      or die("Erro ao tentar cadastrar registro <br>");
      mysqli_close($conexao);
      if (isset($resultado)) {
        return $resultado;
      }
    }


?>
