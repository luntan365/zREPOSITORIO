<?php
class URL {
  private $rotas = [
    'home'=>['acao'=>false,'pagina'=>'home.php'],
    'login'=>['acao'=>false,'pagina'=>'login.php'],
    'cadastrar'=>['acao'=>false, 'pagina'=>'cadastrar.php'],
    'alterar'=>['acao'=>false, 'pagina'=>'alterar.php'],
    'excluir'=>['acao'=>false, 'pagina'=>'excluir.php']
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
      return DIRETORIO_RAIZ.$this->diretorio_acao.$this->rotas[$this->rota]['acao'];
    } else {
      return false;
    }
  }

  public function pagina() {
    if (isset($this->rotas[$this->rota]['pagina'])) {
      return DIRETORIO_RAIZ.$this->diretorio_pagina.$this->rotas[$this->rota]['pagina'];
    } else {
      return DIRETORIO_RAIZ.$this->diretorio_pagina.'404.php';
    }
  }

  public function vars() {
    return $this->vars;
  }

}
