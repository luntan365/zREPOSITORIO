<?php
  class AutoLoad {

    private $diretorios;

    public function __construct(){
      spl_autoload_register(['AutoLoad', 'autocarrega']);
    }

    private function autocarrega($arquivo){
      $this->diretorios = [
        DIRETORIO_RAIZ.'/class/'.$arquivo.'.class.php',
        DIRETORIO_RAIZ.'/interface/'.$arquivo.'.php'
      ];
      foreach ($this->diretorios as $caminho) :
        if (file_exists($caminho)) :
          require_once $caminho;
        endif;
      endforeach;
    }

  }

  new AutoLoad;
