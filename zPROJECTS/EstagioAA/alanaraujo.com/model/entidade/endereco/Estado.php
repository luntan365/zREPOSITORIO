<?php
class Estado implements Entity {

  private $id = null;
  private $descricao = null;
  private $pais_id = null;

  public function __construct($x=null)  {
    if($x===null) return;
    foreach ($x as $atributo => $valor) eval('$this->'.$atributo."('$valor');");
  }
  
  public function pk() { return ['id'=>$this->id]; }
  public function table_name() { return 'estado'; }

  public function id($x=null)  {
  if($x===null) return $this->id;
  $this->id = $x;
  }

  public function descricao($x=null)  {
  if($x===null) return $this->descricao;
  $this->descricao = $x;
  }

  public function pais_id($x=null)  {
  if($x===null) return $this->pais_id;
  $this->pais_id = $x;
  }


}
