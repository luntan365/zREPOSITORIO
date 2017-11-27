<?php
class PessoaFisicaVLD {

  public static function validar(PessoaFisica &$x) {
    $valido = true;

    try {
      $x->cpf(Valida::cpf(false, $x->cpf()));
      if ($x->cpf()) {
        $res = CRUD::select('pessoa_fisica', 'entidade_id', 'cpf = ?', $x->cpf());
        if (!empty($res) && $x->entidade_id() != $res[0]['entidade_id']) {
          Notificacao::notificar_erro('Pessoa Física - CPF: já está cadastrado, <a href="__ativarentidade/ativar/'.$res[0]['entidade_id'].'">clique aqui para selecionar a entidade com o mesmo cpf</a>.');
          $valido = false;
        }
      }
    } catch (Exception $e) {
      Notificacao::notificar_erro("Pessoa Física - CPF: ".$e->getMessage());
      $valido = false;
    }

    try {
      $x->rg(Valida::numero(false, $x->rg(), 20));
    } catch (Exception $e) {
      Notificacao::notificar_erro("Pessoa Física - RG: ".$e->getMessage());
      $valido = false;
    }

    try {
      $x->data_nascimento(Valida::data_nascimento(false, $x->data_nascimento()));
    } catch (Exception $e) {
      Notificacao::notificar_erro("Pessoa Física - Data Nascimento: ".$e->getMessage());
      $valido = false;
    }

    if (!$x->cpf() && !$x->rg() && !$x->data_nascimento()) {
      return null;
    }

    return $valido;
  }

}
