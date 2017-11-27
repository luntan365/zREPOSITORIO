<?php
class BancoVLD {

  public static function validar(Banco &$x) {
    try {
      $x->descricao(Valida::texto(true, $x->descricao(), 45));
      return true;
    } catch (Exception $e) {
      Notificacao::notificar_erro("Banco: ".$e->getMessage());
      return false;
    }
  }


}
