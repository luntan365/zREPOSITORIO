<?php
class Banco implements Entity {

  private $id = null;
  private $descricao = null;

  public function __construct($x=null)  {
    if($x===null) return;
    foreach ($x as $atributo => $valor) eval('$this->'.$atributo."('$valor');");
  }
  
  public function pk() { return ['id'=>$this->id]; }
  public function table_name() { return 'banco'; }
  
  public function id($x=null) {
    if($x===null) return $this->id;
    $this->id = $x;
  }

  public function descricao($x=null) {
    if($x===null) return $this->descricao;
    $this->descricao = $x;
  }


}
