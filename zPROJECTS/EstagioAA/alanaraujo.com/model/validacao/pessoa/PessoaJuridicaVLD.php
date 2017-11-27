<?php
class PessoaJuridicaVLD {

  public static function validar(PessoaJuridica &$x) {
    $valido = true;

    try {
      $x->cnpj(Valida::cnpj(false, $x->cnpj()));
      if ($x->cnpj()) {
        $res = CRUD::select('pessoa_juridica', 'entidade_id', 'cnpj = ?', $x->cnpj());
        if (!empty($res) && $x->entidade_id() != $res[0]['entidade_id']) {
          Notificacao::notificar_erro('Pessoa Jurídica - CNPJ: cnpj já está cadastrado, <a href="__ativarentidade/ativar/'.$res[0]['entidade_id'].'">clique aqui para verificar a entidade com esse cnpj.</a>');
          $valido = false;
        }
      }
    } catch (Exception $e) {
      Notificacao::notificar_erro("Pessoa Jurídica - CNPJ: ".$e->getMessage());
      $valido = false;
    }

    try {
      $x->razao_social(Valida::texto(false, $x->razao_social(), 200));
    } catch (Exception $e) {
      Notificacao::notificar_erro("Pessoa Jurídica - Razão Social: ".$e->getMessage());
      $valido = false;
    }

    try {
      $x->fistel(Valida::registro(false, $x->fistel(), 20));
    } catch (Exception $e) {
      Notificacao::notificar_erro("Pessoa Jurídica - Fístel: ".$e->getMessage());
      $valido = false;
    }

    try {
      $x->numero_entidade(Valida::registro(false, $x->numero_entidade(), 20));
    } catch (Exception $e) {
      Notificacao::notificar_erro("Pessoa Jurídica - Número da Entidade: ".$e->getMessage());
      $valido = false;
    }

    try {
      $x->inscricao_estadual(Valida::registro(false, $x->inscricao_estadual(), 20));
    } catch (Exception $e) {
      Notificacao::notificar_erro("Pessoa Jurídica - Inscrição Estadual: ".$e->getMessage());
      $valido = false;
    }

    try {
      $x->inscricao_municipal(Valida::registro(false, $x->inscricao_municipal(), 20));
    } catch (Exception $e) {
      Notificacao::notificar_erro("Pessoa Jurídica - Inscrição Municipal: ".$e->getMessage());
      $valido = false;
    }

    if (!$x->cnpj() && !$x->razao_social() && !$x->fistel() && !$x->numero_entidade() && !$x->inscricao_estadual() && !$x->inscricao_municipal()) {
      return null;
    }

    return $valido;
  }


}
