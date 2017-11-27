<?php
class Entidade implements Entity {
  
  private $id = null;
  private $pessoa = null;
  private $nome = null;
  private $observacoes = null;
  private $data = null;

  public function __construct($x=null)  {
    if($x===null) return;
    foreach ($x as $atributo => $valor) eval('$this->'.$atributo."('$valor');");    
  }
  
  public function pk() { return ['id'=>$this->id]; }
  public function table_name() { return 'entidade'; }

  public function id($x=null) {
    if($x===null) return $this->id;
    $this->id = $x;
  }

  public function pessoa($x=null) {
    if($x===null) return $this->pessoa;
    $this->pessoa = $x;
  }

  public function nome($x=null) {
    if($x===null) return $this->nome;
    $this->nome = $x;
  }

  public function observacoes($x=null) {
    if($x===null) return $this->observacoes;
    $this->observacoes = $x;
  }

  public function data($x=null) {
    if($x===null) return $this->data;
    $this->data = $x;
  }


}
