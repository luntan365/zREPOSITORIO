<?php
class PessoaFisica extends Pessoa implements Entity {

  private $entidade_id;
  private $cpf;
  private $rg;
  private $data_nascimento;

  public function __construct($x=null)  {
    if($x===null) return;
    foreach ($x as $atributo => $valor) eval('$this->'.$atributo."('$valor');");
  }

  public function pk() { return ['entidade_id'=>$this->entidade_id]; }
  public function table_name() { return 'pessoa_fisica'; }

  public function entidade_id($x=null)  {
    if ($x===null) return $this->entidade_id;
    $this->entidade_id = $x;
  }

  public function cpf($x=null)  {
    if ($x===null) return $this->cpf;
    $this->cpf = $x;
  }

  public function rg($x=null)  {
    if ($x===null) return $this->rg;
    $this->rg = $x;
  }

  public function data_nascimento($x=null)  {
    if($x===null) return $this->data_nascimento;
    $this->data_nascimento = Data::data_db($x);
  }


}
