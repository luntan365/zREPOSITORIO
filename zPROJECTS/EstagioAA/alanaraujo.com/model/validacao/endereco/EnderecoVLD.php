<?php
class EnderecoVLD {

  public static function validar(Endereco &$x) {
    $valido = true;

    try {
      $x->rua(Valida::texto(false, $x->rua(), 100));
    } catch (Exception $e) {
      Notificacao::notificar_erro("Endereço - Rua: ".$e->getMessage());
      $valido = false;
    }

    try {
      $x->numero(Valida::numero(false, $x->numero(), 10));
    } catch (Exception $e) {
      Notificacao::notificar_erro("Endereço - Número: ".$e->getMessage());
      $valido = false;
    }

    try {
      $x->bairro(Valida::texto(false, $x->bairro(), 100));
    } catch (Exception $e) {
      Notificacao::notificar_erro("Endereço - Bairro: ".$e->getMessage());
      $valido = false;
    }

    try {
      $x->cep(Valida::registro(false, $x->cep(), 20));
    } catch (Exception $e) {
      Notificacao::notificar_erro("Endereço - CEP: ".$e->getMessage());
      $valido = false;
    }

    try {
      $x->complemento(Valida::texto(false, $x->complemento(), 500));
    } catch (Exception $e) {
      Notificacao::notificar_erro("Endereço - Complemento: ".$e->getMessage());
      $valido = false;
    }

    try {
      $x->observacoes(Valida::texto(false, $x->observacoes(), 500));
    } catch (Exception $e) {
      Notificacao::notificar_erro("Endereço - Observações: ".$e->getMessage());
      $valido = false;
    }

    if (!$x->rua() && !$x->numero() && !$x->bairro() && !$x->cep() && !$x->complemento() && !$x->observacoes()) {
      return null;
    }
    
    return $valido;
  }


}
