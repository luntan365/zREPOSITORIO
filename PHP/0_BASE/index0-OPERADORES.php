<?php
  echo "Hello World! <br>";

//============Comentario==========================================
  // Comentario de uma Linha
  # Comentario de uma linha
  /*
    Comentando texto
    de varias linhas
  */

//========Variaveis==============================================
  $v0 = "Variavel";
  $v1 = 100;
  echo $v0 . " = " . $v1;
  echo "<br>";
  //constante
  define("nome", "Dejota");
  echo nome . "<br>";
  //variavel de classe constante
  const CONSTATNTE = 1;  
  //========Operaçoes Aritimeticas==============================================
  $v2 = 100;
  $v3 = 10;
  echo "Soma = " . ($v2 + $v3);
  echo "<br>";
  echo "Subtração = " . ($v2 - $v3);
  echo "<br>";
  echo "Multiplicação = " . ($v2 * $v3);
  echo "<br>";
  echo "Divisão = " . ($v2 / $v3);
  echo "<br>";
  echo "Resto Divisão = " . ($v2 % $v3);
  echo "<br>";
  echo "Exponentiation = " . 2 ** 8;
  echo "<br>";
  //usando a funcao do php pra tirar modulo com divisor flutuante
  echo fmod(7,3.3);
  echo "<br>";

  //========Tomada de Decisão==============================================
  if (true) {
    echo "Verdadeiro";
  } else {
    echo "Falso";
  }
  echo "<br>";
  echo "Operadores tomada decisão";
  echo "<br>";
  echo var_dump(0 == "0");
  echo "<br>";
  echo var_dump(0 === 0); //iguais e do mesmo tipo
  echo "<br>";
  echo var_dump(!(0 == 0));
  echo "<br>";
  echo var_dump(0 != 0);
  echo "<br>";
  echo var_dump(0 <> 0); // diferente
  echo "<br>";
  echo var_dump(0 >= 0);
  echo "<br>";
  echo var_dump(0 <= 0);
  echo "<br>";
  echo var_dump(0 > 0);
  echo "<br>";
  echo var_dump(0 < 0);
  echo "<br>";
echo "Operadores logicos";
  echo "<br>";
  echo var_dump(0 < 0 && 0 === 0); // E
  echo "<br>";
  echo var_dump(0 < 0 and 0 === 0); // E
  echo "<br>";
  echo var_dump(0 < 0 || 0 === 0); // OU
  echo "<br>";
  echo var_dump(0 < 0 or 0 === 0); // OU
  echo "<br>";
  echo var_dump(0 === 0 xor 0 === 0); // OU exclusivo
  echo "<br>";
  echo var_dump(0 === 0 ^ 0 === 0); // OU exclusivo
  echo "<br>";
  echo var_dump(!true); // Negação
  echo "<br>";
  echo var_dump(true); // Negação
  echo "<br>";

?>
