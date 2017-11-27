<?php 
class PaisVLD {
  
  public static function validar(Pais &$x) {
    try {
      $x->descricao(Valida::texto(true, $x->descricao(), 60));
      return true;
    } catch (Exception $e) {
      Notificacao::notificar_erro("País: ".$e->getMessage());
      return false;
    }
  }

}
