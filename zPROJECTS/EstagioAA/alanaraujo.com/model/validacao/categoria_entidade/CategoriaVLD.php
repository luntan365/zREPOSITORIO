<?php
class CategoriaVLD {

  public static function validar(Categoria &$x) {
    try {
      $x->descricao(Valida::texto(true, $x->descricao(), 45));
      return true;
    } catch (Exception $e) {
      Notificacao::notificar_erro("Categoria: ".$e->getMessage());
      return false;
    }
  }


}
