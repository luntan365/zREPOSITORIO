<?php
class Cidade implements Entity {

  private $id = null;
  private $descricao = null;
  private $estado_id = null;

  public function __construct($x=null)  {
    if($x===null) return;
    foreach ($x as $atributo => $valor) eval('$this->'.$atributo."('$valor');");
  }
  
  public function pk() { return ['id'=>$this->id]; }
  public function table_name() { return 'cidade'; }

  public function id($x=null)  {
  if($x===null) return $this->id;
  $this->id = $x;
  }

  public function descricao($x=null)  {
  if($x===null) return $this->descricao;
  $this->descricao = $x;
  }

  public function estado_id($x=null)  {
  if($x===null) return $this->estado_id;
  $this->estado_id = $x;
  }


}
