<?php
class CategoriaContatoVLD {

  public static function validar(CategoriaContato &$x) {
    try {
      $x->descricao(Valida::texto(true, $x->descricao(), 45));
      return true;
    } catch (Exception $e) {
      Notificacao::notificar_erro("Categoria do Contato: ".$e->getMessage());
      return false;
    }
  }



}
