<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>PHP</title>
  </head>
  <body>

    <?php

    function funcao(){
      echo "Hello World!!! <br>";
    }
    funcao();

    #parametros com valores padroes caso nao seja informado
    function media ($nota1=0, $nota2=0){
      return ($nota1 + $nota2)/2;
    }
    echo media(10, 20);
    echo "<br>";
    echo media(10);
    echo "<br>";
    echo media();
    echo "<br>";

    #funcao recebe lista parametros
    function media2($dejota,...$valores){
      $total = array_sum($valores)/ count($valores);
      echo $dejota . $total;
    }
    media2("Dejota", 1,2,3,4,5,6,7,8,9);
    echo "<br>";

    #acessar variavel global dentro de uam funçao
    $variavel_global = "Variavel Global";
    function acessar_global(){
      global $variavel_global;
      echo $variavel_global . "<br>";
    }
    acessar_global();

    function acessar_global2(){
      echo $GLOBALS["variavel_global"] . "<br>";
    }
    acessar_global2();

    #Parametro de referencia, recebe o indereço de memoria
    function f(&$p){
      $p = 10000;
    }
    $ss = 5;
    f($ss);
    echo $ss . "<br>";

    #parametros de referencia
    function f2(&$p){
      $p = 10000;
    }
    $ss = 5;
    f2($ss);
    echo $ss . "<br>";

    #declarar que e obrigatorio inserir parametros do
    #tipo definido da função
    #esse codigo deve ser a primeira linha
    #declare(strict_types=1);
    #Parametro tipados
    function funcaotipada(int $num1, int $num2){
      echo $num1 * $num2 . "<br>";
    }
    funcaotipada(3, 5);

    function funcaotiporetorno(int $num1, int $num2) : int {
      return $num1 * $num2;
    }
    echo funcaotiporetorno(3, 38) . "<br>";

     ?>
  </body>
</html>
