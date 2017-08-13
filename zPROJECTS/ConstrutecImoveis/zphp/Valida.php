<?php
class Valida {

  public static function texto($obrigatorio, $texto, $max=45, $min=1) {
    $texto = trim(strip_tags($texto));
    if ($texto || $obrigatorio) {
      if (empty($texto) && $obrigatorio):
        throw new Exception("campo obrigatório.");
      elseif(strlen($texto) < $min):
        throw new Exception("insira no mínimo $min caracteres ou limpe o campo.");
      elseif(strlen($texto) < $min && $obrigatorio):
        throw new Exception("insira no mínimo $min caracteres.");
      elseif(strlen($texto) > $max):
        throw new Exception("insira no máximo $max caracteres ou limpe o campo.");
      elseif(strlen($texto) > $max && $obrigatorio):
        throw new Exception("insira no máximo $max caracteres.");
      endif;
      return $texto;
    }
  }

  public static function numero($obrigatorio, $numero, $max=10, $min=1) {
    $numero = self::texto($obrigatorio, $numero, $max, $min);
    if ($numero || $obrigatorio) {
      if (!preg_match('/^[0-9]*$/', $numero))
        throw new Exception("insira somente números.");
    }
    return $numero;
  }

  public static function registro($obrigatorio, $registro, $max=20, $min=1) {
    $numero = self::texto($obrigatorio, $registro, $max, $min);
    if ($numero || $obrigatorio) {
      if (!preg_match('/^[0-9\/\-\.]*$/', $registro))
        throw new Exception("insira somente números, barra(/), traço(-) ou ponto(.)");
    }
    return $numero;
  }

  public static function email($obrigatorio, $email, $max=100, $min=1)  {
    $email = self::texto($obrigatorio, $email, $max, $min);
    if ($email || $obrigatorio) {
      if (!preg_match('/^([a-z0-9\.\-\_])+([@])([a-z0-9]).([a-z]{2,3})/',$email)):
        throw new Exception("e-mail inválido.");
      elseif(!checkdnsrr(explode('@',$email)[1],'A')):
        throw new Exception("e-mail inválido.");
      endif;
    }
    return $email;
  }

  public static function celular($obrigatorio, $celular){
    $celular = self::texto($obrigatorio, $celular, 16, 8);
    if ($celular || $obrigatorio) {
      if (!preg_match('/^\(?\d{2}\)? ?9? ?\d{4}-?\d{4}$/', $celular))
        throw new Exception("número inválido.");
    }
    return $celular;
  }

  public static function data_nascimento($obrigatorio, $data) {
    $data = self::texto($obrigatorio, $data, 10, 8);
    if ($data || $obrigatorio) {
      $data_temp = preg_replace('/[^0-9]/', '', (string) $data);
      $ano = intval(substr($data_temp, 0, 4));  
      $mes = intval(substr($data_temp, 4, 2)); 
      $dia = intval(substr($data_temp, 6, 2));  
  
      if ($dia < 1 || $dia > 31)
        throw new Exception("dia inválido, insira números de 1 a 31.");
      if ($mes < 1 || $mes > 12)
        throw new Exception("mês inválido, insira números de 1 a 12.");
      if ($ano < 1900)
        throw new Exception("ano da data de nascimento deve ser a partir 1900.");
    }
    return $data;
  }

  public static function cpf($obrigatorio, $cpf) {
    $cpf = self::texto($obrigatorio, $cpf, 14, 11);
    $cpf_original = $cpf;
    if ($cpf || $obrigatorio) {
      $cpf = preg_replace('/[^0-9]/', '', (string) $cpf);
      // Valida tamanho
      if (strlen($cpf) != 11) throw new Exception("inválido.");
      //verificar se está entre esses cpf invalidos
      $invalidos = array('00000000000', '11111111111', '22222222222', '33333333333', '44444444444', '55555555555', '66666666666', '77777777777', '88888888888', '99999999999');
      if (in_array($cpf, $invalidos)) throw new Exception("inválido.");
      // Calcula e confere primeiro dígito verificador
      for ($i = 0, $j = 10, $soma = 0; $i < 9; $i++, $j--)
        $soma += $cpf{$i} * $j;
      $resto = $soma % 11;
      if ($cpf{9} != ($resto < 2 ? 0 : 11 - $resto))
        throw new Exception("inválido.");
      // Calcula e confere segundo dígito verificador
      for ($i = 0, $j = 11, $soma = 0; $i < 10; $i++, $j--)
        $soma += $cpf{$i} * $j;
      $resto = $soma % 11;
      if ($cpf{10} != ($resto < 2 ? 0 : 11 - $resto))
        throw new Exception("inválido.");
    }
    return $cpf_original;
  }


  public static function cnpj($obrigatorio, $cnpj) {
    $cnpj = self::texto($obrigatorio, $cnpj, 18, 14);
    $cnpj_original = $cnpj;
    if ($cnpj || $obrigatorio) {
    	$cnpj = preg_replace('/[^0-9]/', '', (string) $cnpj);
      $invalidos = ['00000000000000','11111111111111','22222222222222','33333333333333',	'44444444444444','55555555555555','66666666666666','77777777777777','88888888888888',    	'99999999999999' ];
      // Verifica se o CNPJ está na lista de inválidos
      if (in_array($cnpj, $invalidos))  throw new Exception("inválido.");
    	if (strlen($cnpj) != 14)	throw new Exception("inválido.");
    	// Valida primeiro dígito verificador
    	for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++)	{
    		$soma += $cnpj{$i} * $j;
    		$j = ($j == 2) ? 9 : $j - 1;
    	}
    	$resto = $soma % 11;
    	if ($cnpj{12} != ($resto < 2 ? 0 : 11 - $resto))	throw new Exception("inválido.");
    	// Valida segundo dígito verificador
    	for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++)	{
    		$soma += $cnpj{$i} * $j;
    		$j = ($j == 2) ? 9 : $j - 1;
    	}
    	$resto = $soma % 11;
    	$valid =  ($cnpj{13} == ($resto < 2 ? 0 : 11 - $resto));
      if (!$valid) throw new Exception("inválido.");
    }
    return $cnpj_original;
  }

  public static function numero_inteiro($obrigatorio, $numero, $type="int") {
    $numero = self::texto($obrigatorio, $numero, 20, 1);
    if ($numero || $obrigatorio) {
      if (!preg_match('/^[0-9]+$/', $numero))
        throw new Exception("insira somente números");
      switch ($type) {
        case 'byte':
          if ($numero < -128 || $numero > 127)
            throw new Exception('insira números de -128 a 127.');
          break;
        case 'short':
          if ($numero < -32768 || $numero > 32767)
            throw new Exception('insira números de -32768 a 32767.');
          break;
        case 'int':
          if ($numero < -2147483648 || $numero > 2147483647)
            throw new Exception('insira números de -2147483648 a 2147483647.');
          break;
        case 'long':
          if ($numero < -9223372036854775808 || $numero > 9223372036854775807)
            throw new Exception('insira números de -9223372036854775808 a 9223372036854775807.');
          break;
        case 'ubyte':
          if ($numero < 0 || $numero > 255)
            throw new Exception('insira números de 0 a 255.');
          break;
        case 'ushort':
          if ($numero < 0 || $numero > 65535)
            throw new Exception('insira números de 0 a 65535.');
          break;
        case 'uint':
          if ($numero < 0 || $numero > 4294967295)
            throw new Exception('insira números de 0 a 4294967295.'); break;
        case 'ulong':
          if ($numero < 0 || $numero > 18446744073709551615)
            throw new Exception('insira números de 0 a 18446744073709551615.');
          break;
        default:
          throw new Exception('Parametro type do método Valida::id() está incoerente.');
          break;
      }
    }
  }


}
