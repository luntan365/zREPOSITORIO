<?php

  new AutoLoad;

  class AutoLoad {

    private $diretorios;

    public function __construct(){
      spl_autoload_register([$this, 'autocarrega']);
    }

    private function autocarrega($arquivo){
      $this->diretorios = [
        "class/$arquivo.class.php"
      ];
      foreach ($this->diretorios as $caminho) :
        if (file_exists($caminho)) :
          require_once $caminho;
        endif;
      endforeach;
    }

  }
