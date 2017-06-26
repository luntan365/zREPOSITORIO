<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>PHP</title>
  </head>
  <body>

    <?php

    $a0 = array();
    $a0[10] = 1;
    $a0[11] = 2;
    $a0[12] = 3;
    $a0[] = 4;
    print_r($a0);

    echo "<br>";

    $a1 = array(1,2,3);
    $a1[] = 4;
    print_r($a1);

    echo "<br>";

    $a2 = [1, 2, 3, 4];
    print_r($a2);

    echo "<br>";
    #excluir elemento, unset apaga elemento da memoria
    unset($a2[2]);
    print_r($a2);

    echo "<br>";
    print_r(range(1,10));
    echo "<br>";
    print_r(range(10,1));
    echo "<br>";
    print_r(range(1,10,2));
    echo "<br>";
    print_r(range(10,1,3));
    echo "<br>";
    print_r(range("a","z"));
    echo "<br>";

    foreach ($a0 as $value) {
      echo $value;
    }

    echo "<br>";

    foreach ($a0 as $k => &$value) {
      $a0[$k] *= $value;
    }
    print_r($a0);
    echo "<br>";

    #array assossiados
    $aa = ["chave1"=>1, "chave2"=>"valor", "chave3"=>true];
    echo $aa["chave1"];
    echo $aa["chave2"];
    echo $aa["chave3"];

    echo "<br>";

      #array bidimencional
      $ad = array(
        array(1,"Paulo", true),
        array(2,"Jose", true),
        array(3,"Maria", false)
      );
      echo $ad[1] [1];
      echo "<br>";
      $ad = [
        ["ID"=>1,"NOME"=>"Paulo", "TIPO"=>true],
        ["ID"=>2,"NOME"=>"Jose", "TIPO"=>true],
        ["ID"=>3,"NOME"=>"Maria", "TIPO"=>false]
      ];
      echo $ad[1] ["NOME"];
      echo "<br>";

      #função verificar se é um array
      echo is_array($ad);
      echo "<br>";

      #função verificar quantidade elementos array
      echo count($ad);
      echo "<br>";

      #função verificar se elemento esta dentro do array array
      echo in_array(2, [0,1,2,3,4,5,6,7,8,9]);
      echo "<br>";

      #função ORDENAR array
      $desordenardo = ["c", "b", "a"];
      sort($desordenardo);
      print_r($desordenardo);
      echo "<br>";

      #função inverter array
      $inverter = [1, 2, 3];
      print_r(array_reverse($inverter));
      echo "<br>";

      #função soma array
      $soma = [1, 2, 3, 994];
      print_r(array_sum($soma));
      echo "<br>";

      #função juntar arrays
      $j1 = [1, 2, 3, 994];
      $j2 = ["c", "b", "a"];
      $unidos = array_merge($j1, $j2);
      print_r($unidos);
      echo "<br>";

     ?>


  </body>
</html>
