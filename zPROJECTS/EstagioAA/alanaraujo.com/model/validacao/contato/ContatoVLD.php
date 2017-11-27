<?php
class ContatoVLD {

  public static function validar(Contato &$x) {
    $valido = true;

    try {
      $x->contato(Valida::texto(true, $x->contato(), 500));
    } catch (Exception $e) {
      Notificacao::notificar_erro("Contato - Contato: ".$e->getMessage());
      $valido = false;
    }

    try {
      $x->observacoes(Valida::texto(false, $x->observacoes(), 500));
    } catch (Exception $e) {
      Notificacao::notificar_erro("Contato - Observações: ".$e->getMessage());
      $valido = false;
    }

    if (!$x->contato() && !$x->observacoes()) {
      return null;
    }

    return $valido;
  }

}
