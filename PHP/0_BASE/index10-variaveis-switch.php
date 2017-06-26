<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>PHP</title>
  </head>
  <body>

    <?php

    /*Ao atribur valor de uma variavel a outra ($a = $b)
    , será feita uma copia completa dos elementos de uma variavel,
    criando um novo elemento na memoria (que nao é bom se for grande).
    */

    $a = 10;
    $b = $a;
    $a = 0;
    echo $a . "<br>";
    echo $b . "<br>";

    /*Caso deseje que duas variveis aponte
    para um mesmo local de memoria
    ($a = &$b)
    */
    $a2 = 10;
    $b2 = &$a2;
    $a2 = 0;
    echo $a2 . "<br>";
    echo $b2 . "<br>";

    #Caso a variavel atribuda nao exista, usa valor depois da ??
    $telen2 = "9627-4732";
    $ddd = $dddn ?? "00";
    $telefone = $telen ?? $telen2 ?? " 0000-0000";
    echo "Tel: ($ddd)  $telefone  <br>";

    #veriificar se é maior menor ou igual de uma vez
    #pode comprar array e caracteres tbm
    switch (5<=>10) {
      case -1:
          echo "Primeiro e menor que o segundo <br>";
        break;

      case 0:
          echo "Primeiro e ihail ao segundo <br>";
        break;

      case 1:
          echo "Primeiro e maior que o segundo <br>";
        break;

      default:
        # code...
        break;
    }

    




     ?>
  </body>
</html>
