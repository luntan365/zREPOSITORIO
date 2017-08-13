<?php
class SESSION {

  public static function valor_return($sessao, $objeto, $atributo, $senao='') {
    if (self::invocavel($sessao, $objeto, $atributo))
      return self::ss($sessao)->$objeto()->$atributo();
    else
      return $senao;
  }
  
  public static function valor($sessao, $objeto, $atributo, $senao='') {
    if (self::invocavel($sessao, $objeto, $atributo))
      echo self::ss($sessao)->$objeto()->$atributo();
    else
      echo $senao;
  }

  public static function igual_entao($sessao, $objeto, $atributo, $igual, $entao) {
    if (self::invocavel($sessao, $objeto, $atributo) && self::ss($sessao)->$objeto()->$atributo() == $igual)
      echo $entao;     
  }

  public static function existe_entao($sessao, $objeto, $atributo, $entao, $senao='') {
    if (self::invocavel($sessao, $objeto, $atributo))
          echo $entao;
      else
        echo $senao;
  }

  public static function existe_inarray_entao($sessao, $objeto, $key, $entao) {
    if (!empty(self::ss($sessao)) && method_exists(self::ss($sessao), $objeto) && array_key_exists($key, self::ss($sessao)->$objeto()))
          echo $entao;  
  }

  //========METODOS PARA RETORNAR ENDEREÇO CONTATO E CONTABANCARIA=========\\

  public static function valor2($sessao, $atributo, $senao='') {
    if (!empty(self::ss($sessao)) && method_exists(self::ss($sessao), $atributo))
      echo self::ss($sessao)->$atributo();
    else
      echo $senao;
  }

  public static function igual_entao2($sessao, $atributo, $igual, $entao, $senao='') {
    if (!empty(self::ss($sessao)) && method_exists(self::ss($sessao), $atributo) && self::ss($sessao)->$atributo() == $igual)
      echo $entao;
    else
      echo $senao;
  }

  //=========================METODOS BASICOS=================================\\
  
  public static function ss($sessao, $valor=null) {
    if ($valor===null){
      if (!empty($_SESSION[$sessao])) {
        return unserialize($_SESSION[$sessao]);
      } 
      return null;
    }      
    $_SESSION[$sessao] = serialize($valor);     
  }

  public static function invocavel($sessao, $objeto, $atributo){
    if (!empty(self::ss($sessao)) && method_exists(self::ss($sessao), $objeto) && method_exists(self::ss($sessao)->$objeto(), $atributo)){
      return true;
    }
    return false;
  }
  
}
