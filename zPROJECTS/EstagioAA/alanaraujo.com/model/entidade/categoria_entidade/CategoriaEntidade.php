<?php
class CategoriaEntidade implements Entity {

  private $entidade_id = null;
  private $categoria_id = null;

  public function __construct($x=null)  {
    if($x===null) return;
    foreach ($x as $atributo => $valor) eval('$this->'.$atributo."($valor);");
  }

  public function pk() { return ['categoria_id'=>$this->categoria_id, 'entidade_id'=>$this->entidade_id]; }
  public function table_name() { return 'categoria_entidade'; }

  public function entidade_id($x=null) {
    if($x===null) return $this->entidade_id;
    $this->entidade_id = $x;
  }

  public function categoria_id($x=null) {
    if($x===null) return $this->categoria_id;
    $this->categoria_id = $x;
  }



}
