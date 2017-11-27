<?php
class EntidadeVLD {

  public static function validar(Entidade &$x) {
    $valido = true;

    if (!$x->pessoa()) {
      Notificacao::notificar_erro("Entidade - Pessoa Física ou Jurídica: é um campo obrigatório.");
      $valido = false;
    } elseif (!($x->pessoa() == 'fisica' || $x->pessoa() == 'juridica')) {
      Notificacao::notificar_erro("Entidade - Pessoa Física ou Jurídica: valor inválido.");
      $valido = false;
    }

    try {
      $x->nome(Valida::texto(true, $x->nome(), 100));
    } catch (Exception $e) {
      Notificacao::notificar_erro("Entidade - Nome: ".$e->getMessage());
      $valido = false;
    }

    try {
      $x->observacoes(Valida::texto(false, $x->observacoes(), 2000));
    } catch (Exception $e) {
      Notificacao::notificar_erro("Entidade - Observações: ".$e->getMessage());
      $valido = false;
    }

    if (!$x->pessoa() && !$x->nome() && !$x->observacoes()) {
      return null;
    }

    return $valido;
  }

}
