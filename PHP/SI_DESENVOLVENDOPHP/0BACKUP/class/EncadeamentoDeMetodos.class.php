<?php
  class EncadeamentoDeMetodos {

    private $string;

    function __construct($string) {
      $this->string = $string;
    }

    public function primeira_letra_maiuscula() {
      $this->string =  ucfirst($this->string);
      return $this;
    }

    public function primeira_letra_maiuscula_de_cada_Palavra() {
      $this->string =  ucwords($this->string);
      return $this;
    }

    public function remove_ifem() {
      $this->string =  str_replace('-', ' ', $this->string);
      return $this;
    }

    public function __toString() { //toString altomatico do php
      return $this->string;
    }

  }

  // $obj_va = new EncadeamentoDeMetodos("dejota-stormrage aprendendo encadeamento de metodos em php.");
  //
  // print($obj_va->primeira_letra_maiuscula()
  //                 ->remove_ifem()
  //                 ->primeira_letra_maiuscula_de_cada_Palavra()
  //               );
