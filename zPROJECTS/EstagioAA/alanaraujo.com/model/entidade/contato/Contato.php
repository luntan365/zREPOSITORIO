<?php
class Contato implements Entity {

  private $id = null;
  private $contato = null;
  private $observacoes = null;
  private $categoria_contato_id = null;
  private $entidade_id = null;

  public function __construct($x=null)  {
    if($x===null) return;
    foreach ($x as $atributo => $valor) eval('$this->'.$atributo."('$valor');");
  }

  public function pk() { return ['id'=>$this->id]; }
  public function table_name() { return 'contato'; }

  public function id($x=null) {
    if($x===null) return $this->id;
    $this->id = $x;
  }

  public function contato($x=null) {
    if ($x===null) return $this->contato;
    $this->contato = $x;
  }

  public function observacoes($x=null) {
    if($x===null) return $this->observacoes;
    $this->observacoes = $x;
  }

  public function categoria_contato_id($x=null) {
    if($x===null) return $this->categoria_contato_id;
    $this->categoria_contato_id = $x;
  }

  public function entidade_id($x=null) {
    if($x===null) return $this->entidade_id;
    $this->entidade_id = $x;
  }

}
