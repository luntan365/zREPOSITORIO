<?php
class Endereco implements Entity {

  private $id = null;
  private $rua = null;
  private $numero = null;
  private $bairro = null;
  private $cep = null;
  private $complemento = null;
  private $observacoes = null;
  private $cidade_id = null;
  private $entidade_id = null;

  public function __construct($x=null)  {
    if($x===null) return;
    foreach ($x as $atributo => $valor) eval('$this->'.$atributo."('$valor');");
  }
  
  public function pk() { return ['id'=>$this->id]; }
  public function table_name() { return 'endereco'; }

  public function id($x=null)  {
  if($x===null) return $this->id;
  $this->id = $x;
  }

  public function entidade_id($x=null)  {
  if($x===null) return $this->entidade_id;
  $this->entidade_id = $x;
  }

  public function rua($x=null)  {
  if($x===null) return $this->rua;
  $this->rua = $x;
  }

  public function numero($x=null)  {
  if($x===null) return $this->numero;
  $this->numero = $x;
  }
  public function bairro($x=null)  {
  if($x===null) return $this->bairro;
  $this->bairro = $x;
  }

  public function cep($x=null)  {
  if($x===null) return $this->cep;
  $this->cep = $x;
  }

  public function complemento($x=null)  {
  if($x===null) return $this->complemento;
  $this->complemento = $x;
  }
  
  public function observacoes($x=null)  {
  if($x===null) return $this->observacoes;
  $this->observacoes = $x;
  }

  public function cidade_id($x=null)  {
  if($x===null) return $this->cidade_id;
  $this->cidade_id = $x;
  }

}
