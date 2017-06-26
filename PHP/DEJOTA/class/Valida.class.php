<?php
class Valida {

  public static function remover_caracteres_especiais($string)  {
    $string = iconv( "UTF-8" , "ASCII//TRANSLIT//IGNORE" , $string );
    $string = preg_replace( array( '/[ ]/' , '/[^A-Za-z0-9]/' ) , array( '' , '' ) , $string );
    return $string;
  }

  public static function escape_html($text){
    return htmlspecialchars($text);
  }

  public static function texto($text, $sizemax=45, $sizemin=0)  {
    $text = trim(strip_tags($text));
    if (empty($text)):
      throw new Exception("Campo está vazio.");
    elseif(strlen($text)>$sizemax):
      throw new Exception("Deve conter no máximo $sizemax caracteres.");
    elseif(strlen($text)<$sizemin):
      throw new Exception("Deve conter no mínimo $sizemin caracteres.");
    endif;
    return $text;
  }

  public static function email($email)  {
    $email = self::texto($email, 100);
    if (!preg_match('/^([a-z0-9\.\-_])+([@])([a-z0-9]).([a-z]{2,3})/',$email)):
      throw new Exception("E-mail inválido.");
    elseif(!checkdnsrr(explode('@',$email)[1],'A')):
      throw new Exception("E-mail inválido.");
    endif;
    return $email;
  }

  public static function telefone($celular){
    $celular = self::texto($celular, 16, 8);
    if (!preg_match('/^\(?\d{2}\)? ?9? ?\d{4}-?\d{4}$/', $celular))
      throw new Exception("Número inválido.");
    return $celular;
  }

  public static function cpf($cpf) {
    $cpf = self::texto($cpf, 14, 11);
    $cpf = preg_replace('/[^0-9]/', '', (string) $cpf);
    $cpf_original = $cpf;
    // Valida tamanho
    if (strlen($cpf) != 11) throw new Exception("CPF inválido.");
    //verificar se está entre esses cpf invalidos
    $invalidos = array('00000000000', '11111111111', '22222222222', '33333333333', '44444444444', '55555555555', '66666666666', '77777777777', '88888888888', '99999999999');
    if (in_array($cpf, $invalidos)) throw new Exception("CPF inválido.");
    // Calcula e confere primeiro dígito verificador
    for ($i = 0, $j = 10, $soma = 0; $i < 9; $i++, $j--)
      $soma += $cpf{$i} * $j;
    $resto = $soma % 11;
    if ($cpf{9} != ($resto < 2 ? 0 : 11 - $resto))
      throw new Exception("CPF inválido.");
    // Calcula e confere segundo dígito verificador
    for ($i = 0, $j = 11, $soma = 0; $i < 10; $i++, $j--)
      $soma += $cpf{$i} * $j;
    $resto = $soma % 11;
    if ($cpf{10} != ($resto < 2 ? 0 : 11 - $resto))
      throw new Exception("CPF inválido.");
    return $cpf_original;
  }

  public static function cnpj ($cnpj) {
      $cnpj = self::texto($cnpj, 18, 14);
      // Deixa o CNPJ com apenas números
      $cnpj_completo = $cnpj;
      $cnpj = preg_replace( '/[^0-9]/', '', $cnpj );
      if (strlen($cnpj) != 14) throw new Exception("CNPJ inválido.");
      // Garante que o CNPJ é uma string
      // O valor original
      $cnpj_original = (string)$cnpj;
      // Captura os primeiros 12 números do CNPJ
      $primeiros_numeros_cnpj = substr( $cnpj, 0, 12 );
      if ( ! function_exists('multiplica_cnpj') ) {
          function multiplica_cnpj( $cnpj, $posicao = 5 ) {
              // Variável para o cálculo
              $calculo = 0;
              // Laço para percorrer os item do cnpj
              for ( $i = 0; $i < strlen( $cnpj ); $i++ ) {
                  // Cálculo mais posição do CNPJ * a posição
                  $calculo = $calculo + ( $cnpj[$i] * $posicao );
                  // Decrementa a posição a cada volta do laço
                  $posicao--;
                  // Se a posição for menor que 2, ela se torna 9
                  if ( $posicao < 2 ) {
                      $posicao = 9;
                  }
              }
              // Retorna o cálculo
              return $calculo;
          }
      }
      // Faz o primeiro cálculo
      $primeiro_calculo = multiplica_cnpj( $primeiros_numeros_cnpj );
      // Se o resto da divisão entre o primeiro cálculo e 11 for menor que 2, o primeiro
      // Dígito é zero (0), caso contrário é 11 - o resto da divisão entre o cálculo e 11
      $primeiro_digito = ( $primeiro_calculo % 11 ) < 2 ? 0 :  11 - ( $primeiro_calculo % 11 );
      // Concatena o primeiro dígito nos 12 primeiros números do CNPJ
      // Agora temos 13 números aqui
      $primeiros_numeros_cnpj .= $primeiro_digito;
      // O segundo cálculo é a mesma coisa do primeiro, porém, começa na posição 6
      $segundo_calculo = multiplica_cnpj( $primeiros_numeros_cnpj, 6 );
      $segundo_digito = ( $segundo_calculo % 11 ) < 2 ? 0 :  11 - ( $segundo_calculo % 11 );
      // Concatena o segundo dígito ao CNPJ
      $cnpj = $primeiros_numeros_cnpj . $segundo_digito;
      // Verifica se o CNPJ gerado é idêntico ao enviado
      if ( $cnpj === $cnpj_original ) {
        return $cnpj_completo;
      } else {
         throw new Exception("CNPJ inválido.");
      }
  }




}
