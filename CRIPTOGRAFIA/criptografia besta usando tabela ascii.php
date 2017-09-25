<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>TRABALHO CRIPTOGRAFIA</title>
  </head>
  <body>

    <?php

    /** Função de para criptografar
     * $key = chave usada para criptografar e descriptografar
     * $text = $dados a serem criptografados
     */
    function encryptar($key, $text) {
      // pega o tamanho das string da chave e do texto para ser utilizados no loop for
      $text_size = strlen($text);
      $key_size = strlen($key);
      //inicializando variavel que retornar o texto criptografado
      $encryptado = '';
      //loop for que percorrerar a string do texto e da chave, somando seu valores de acordo com a tabela ASCII
      for ($i = 0, $j = 0; $i < $text_size; $i++, $j++) {
        //se a palavra chave chegar no ultimo caracter, deve começar do inicio novamente
        if ($j >= $key_size) { $j = 0; }
        //pegando numero de acordo com tabela ascii do caracter atual da chave e do texto
        $num_char_text = ord($text[$i]);
        $num_char_key = ord($key[$j]);
        // somando os valores do caracters
        $encry_char = $num_char_text + $num_char_key;
        // se a soma dos valores ultrapassar 255
        if ($encry_char > 255) {
          // o resto dos numeros que ultrapassarem 255 sera dado como no numero, e como se voltave a contar ao inicio quando ultrapassa-se 255
          $encry_char = ($num_char_text + $num_char_key) - 255;
        }
        // adicionado caracter criptografado ao variavel de que retornará o texto completo criptografado
        $encryptado .= chr($encry_char);
      }
      // retornando conteudo criptografado
      return $encryptado;
    }


    /** Função de para criptografar
     * $key = chave usada para criptografar e descriptografar
     * $text = $dados a serem descriptografar
     */
    function decryptar($key, $text) {
      // pega o tamanho das string da chave e do texto para ser utilizados no loop for
      $text_size = strlen($text);
      $key_size = strlen($key);
      //inicializando variavel que retornar o texto descriptografado
      $decryptado = '';
      for ($i = 0, $j = 0; $i < $text_size; $i++, $j++) {
        //se a palavra chave chegar no ultimo caracter, deve começar do inicio novamente
        if ($j >= $key_size) { $j = 0; }
        //pegando numero de acordo com tabela ascii do caracter atual da chave e do texto
        $num_char_text = ord($text[$i]);
        $num_char_key = ord($key[$j]);
        // subtraindo os valores do caracters
        $encry_char = $num_char_text - $num_char_key;
        // se a subtração for menor que 1
        if ($encry_char < 1) {
          // o numero negativo deve somar a 255 para que ele volte está na margem de 1 a 255
          $encry_char = $encry_char + 255;
        }
        // adicionado caracter decriptografado ao variavel de que retornará o texto completo decriptografado
        $decryptado .= chr($encry_char);
      }
        // retornando conteudo decriptografado
      return $decryptado;
    }


    $chave = "asdbyasd465ad8s6";
    $texto = "Dejota Litt Jasher Jardel";
    $enc =  encryptar($chave, $texto);
    $dec = decryptar($chave, $enc);

    echo "$enc <br>";
    echo "$dec <br>";




    ?>

  </body>
</html>
<?php
