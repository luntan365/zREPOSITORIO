<?php 
class EstadoVLD {
  
  public static function validar(Estado &$x) {
    try {
      $x->descricao(Valida::texto(true, $x->descricao(), 75));
      return true;
    } catch (Exception $e) {
      Notificacao::notificar_erro("Estado: ".$e->getMessage());
      return false;
    }
  }

}
