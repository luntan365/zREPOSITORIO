<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>PHP</title>
  </head>
  <body>

    <?php
    //Classe String
    // Aspas '' texto puro, string na forma mais primitiva =
    $str = 'DeJoTa';
    echo $str . "<br>";
    //Aspas Duplas "" texto interpolado ou concatenado com texto
    $str = "DeJoTa";
    echo $str . "<br>";
    //imprimir aspas
    echo "I'm \"good\"!!! <br>";
    //imterpolar
    $num = 99;
    echo "O número é $num <br>";
    //concatenar
    $num = 66;
    echo "O número é " . $num . "<br>";
    //Toda string e um array
    echo $str[2] . "<br>";
    //strlen retorn tamanho String
    echo strlen("012345679") . "<br>";
    //substr(string, indice Inicial, quantidade caracteres)
    //retorna um pedaço da string
    echo substr("012345679", 2, 5) . "<br>";
    //retorna tudo em maiuscuo
    echo strtoupper("dejota") . "<br>";
    //retorna tudo em menusculo
    echo strtolower("dejota") . "<br>";
    //str_replace(quem, por, onde);
    echo str_replace("j", "rr", "Dejota") . "<br>";










     ?>
  </body>
</html>
