<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>PHP</title>
  </head>
  <body>

    <?php

    #funçoes anonimas
    $func = function($nome){
      echo "Meu nome é $nome <br>";
    };
    $func("Dejota");

    #passando a função anonima por parametro
    $func2 = function($func){
      $func("Dejota");
    };
    $func2($func);

    #acessando variavel global com função anonimas
    $variavel = 1000;
    $funvar = function() use(&$variavel){
      $variavel = 666;
    };
    $funvar();
    echo $variavel . "<br>";


    # array_map(umaFunçãoQueSeraExecutadaParaCadaItemDaLista, Lista);
    # array_filter(Lista, funçãoFiltroRetornaTrueOuFalse );








     ?>
  </body>
</html>
