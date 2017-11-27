<?php
class PessoaVLD {
  
  public static function validar(Pessoa &$x) {
    if (method_exists($x,'cpf')) {
      return PessoaFisicaVLD::validar($x);        
    } elseif (method_exists($x,'cnpj')) {
      return PessoaJuridicaVLD::validar($x);
    }
  }
  
}
