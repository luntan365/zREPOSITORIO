<?php
class ContaBancariaVLD {

  public static function validar(ContaBancaria &$x) {
    $valido = true;

    try {
      $x->agencia(Valida::texto(false, $x->agencia(), 20));
    } catch (Exception $e) {
      Notificacao::notificar_erro("Conta Bancária - Agência: ".$e->getMessage());
      $valido = false;
    }

    try {
      $x->numero_conta(Valida::numero(false, $x->numero_conta(), 20));
    } catch (Exception $e) {
      Notificacao::notificar_erro("Conta Bancária - Número da Conta: ".$e->getMessage());
      $valido = false;
    }

    try {
      $x->operacao(Valida::texto(false, $x->operacao(), 3));
    } catch (Exception $e) {
      Notificacao::notificar_erro("Conta Bancária - Operação: ".$e->getMessage());
      $valido = false;
    }

    try {
      $x->observacoes(Valida::texto(false, $x->observacoes(), 500));
    } catch (Exception $e) {
      Notificacao::notificar_erro("Conta Bancária - Observações: ".$e->getMessage());
      $valido = false;
    }

    if (!$x->agencia() && !$x->numero_conta() && !$x->operacao() && !$x->observacoes()) {
      return null;
    }

    return $valido;
  }


}
