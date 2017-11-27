<?php 
class CidadeVLD {
  
  public static function validar(Cidade &$x) {
    try {
      $x->descricao(Valida::texto(true, $x->descricao(), 120));
      return true;
    } catch (Exception $e) {
      Notificacao::notificar_erro("Cidade: ".$e->getMessage());
      return false;
    }
  }

}
