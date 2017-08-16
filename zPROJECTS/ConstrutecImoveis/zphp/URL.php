<?php
class URL {
  private $rotas = [
    'home'=>['acao'=>false,'pagina'=>'home'],

    'acesso'=>['acao'=>false,                     'pagina'=>'acesso'],
    'acesso_logar'=>['acao'=>'acesso_logar',      'pagina'=>'home'],
    'acesso_deslogar'=>['acao'=>'acesso_deslogar', 'pagina'=>'home'],

    'cadastro'=>['acao'=>false, 'pagina'=>'cadastro'],
    'cadastro_cadastrar'=>['acao'=>'cadastro_cadastrar',  'pagina'=>'cadastro'],
    'cadastro_adicionar'=>['acao'=>'cadastro_adicionar', 'pagina'=>'cadastro'],
    'cadastro_cancelar'=> ['acao'=>'cadastro_cancelar',  'pagina'=>'cadastro'],

    'alterar'=>['acao'=>false, 'pagina'=>'alterar'],
    'excluir'=>['acao'=>false, 'pagina'=>'excluir']
  ];

  private $rota = '';
  private $vars = [];
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
    } else {
      $this->rota = "home";
    }
  }

  public function acao() {
    if (isset($this->rotas[$this->rota]['acao']) && $this->rotas[$this->rota]['acao']) {
      return DIRETORIO_RAIZ.$this->diretorio_acao.$this->rotas[$this->rota]['acao'].'.php';
    } else {
      return false;
    }
  }

  public function pagina() {
    if (isset($this->rotas[$this->rota]['pagina'])) {
      return DIRETORIO_RAIZ.$this->diretorio_pagina.$this->rotas[$this->rota]['pagina'].'.php';
    } else {
      return DIRETORIO_RAIZ.$this->diretorio_pagina.'404.php';
    }
  }

  public function vars() {
    return $this->vars;
  }

}
