<?php
class URL {
  private $rotas = [
    'home'=>['acao'=>false,'pagina'=>'home']
  ];

  private $rota = 'home';
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
    }
  }

  public function vars() {
    return $this->vars;
  }

  public function acao() {
    if (isset($this->rotas[$this->rota]['acao']) && $this->rotas[$this->rota]['acao'] !== false) {
      return DIRETORIO_RAIZ.$this->diretorio_acao.$this->rotas[$this->rota]['acao'].'.php';
    } else {
      return false;
    }
  }

  public function pagina($x=null) {
    if ($x===null) {
      if (isset($this->rotas[$this->rota]['pagina']) && $this->rotas[$this->rota]['pagina'] !== false) {
        return DIRETORIO_RAIZ.$this->diretorio_pagina.$this->rotas[$this->rota]['pagina'].'.php';
      } elseif (isset($this->rotas[$this->rota]['pagina']) && $this->rotas[$this->rota]['pagina'] === false) {
        return false;
      }else {
        return DIRETORIO_RAIZ.$this->diretorio_pagina.'404.php';
      }
    } else {
      $this->rotas[$this->rota]['pagina'] = $x;
    }
  }

  public function rotas($x=null) {
    if ($x===null)
      return $this->rotas;
    else
      $this->rotas = $x;
  }

}
