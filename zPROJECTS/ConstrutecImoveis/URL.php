<?php
class URL {
  private $rotas = [
    'home'=>['acao'=>false,'pagina'=>'home'],
    'pesquisar'=>['acao'=>'pesquisar','pagina'=>'home'],

    'acesso'=>['acao'=>false,                     'pagina'=>'acesso'],
    'acesso_logar'=>['acao'=>'acesso_logar',      'pagina'=>'home'],
    'acesso_deslogar'=>['acao'=>'acesso_deslogar', 'pagina'=>'home'],

    'logado_alterar_valor'=>['acao'=>'logado_alterar_valor', 'pagina'=>'home'],
    'logado_alterar_disponivel'=>['acao'=>'logado_alterar_disponivel', 'pagina'=>'home'],
    'logado_alterar_indisponivel'=>['acao'=>'logado_alterar_indisponivel', 'pagina'=>'home'],
    'logado_excluir'=>['acao'=>false, 'pagina'=>'logado_excluir'],
    'logado_excluir_confirmado'=>['acao'=>'logado_excluir_confirmado', 'pagina'=>'home'],

    'cadastro'=>['acao'=>false, 'pagina'=>'cadastro'],
    'cadastro_cadastrar'=>['acao'=>'cadastro_cadastrar',  'pagina'=>'cadastro'],
    'cadastro_adicionar'=>['acao'=>'cadastro_adicionar', 'pagina'=>'cadastro'],
    'cadastro_cancelar'=> ['acao'=>'cadastro_cancelar',  'pagina'=>'cadastro'],
    'cadastro_remover'=> ['acao'=>'cadastro_remover',  'pagina'=>'cadastro'],

    'alterar'=>['acao'=>false, 'pagina'=>'alterar'],
    'excluir'=>['acao'=>false, 'pagina'=>'excluir']
  ];

  private $rota = 'home';
  private $vars = [];
  private $acao = false;
  private $pagina = false;
  private $diretorio_pagina = '/zpagina/';
  private $diretorio_acao = '/zacao/';

  public function __construct() {
    if (!empty($_GET['urlroute'])) {
      $urlist = explode("/", $_GET['urlroute']);
      for ($i=0; $i < count($urlist); $i++) {
        if ($i == 0) {
          $this->rota = $urlist[$i];
        } else {
          $this->vars[] = $urlist[$i];
        }
      }
    }
    $this->acao = $this->rotas[$this->rota]['acao'];
    $this->pagina = $this->rotas[$this->rota]['pagina'];
  }

  public function acao($x=null) {
    if ($x===null) {
      if (isset($this->rotas[$this->rota]['acao']) && $this->rotas[$this->rota]['acao']) {
        return DIRETORIO_RAIZ.$this->diretorio_acao.$this->acao.'.php';
      } else {
        return false;
      }
    } else {
      $this->acao = $x;
    }
  }

  public function pagina($x=null) {
    if ($x===null) {
      if (isset($this->rotas[$this->rota]['pagina'])) {
        return DIRETORIO_RAIZ.$this->diretorio_pagina.$this->pagina.'.php';
      } else {
        return DIRETORIO_RAIZ.$this->diretorio_pagina.'404.php';
      }
    } else {
      $this->pagina = $x;
    }
  }

  public function vars() {
    return $this->vars;
  }

}
