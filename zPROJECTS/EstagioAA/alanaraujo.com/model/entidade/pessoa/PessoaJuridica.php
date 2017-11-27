<?php
class PessoaJuridica extends Pessoa implements Entity {

  private $entidade_id = null;
  private $cnpj = null;
  private $razao_social = null;
  private $fistel = null;
  private $numero_entidade = null;
  private $inscricao_estadual = null;
  private $inscricao_municipal = null;

  public function __construct($x=null)  {
    if($x===null) return;
    foreach ($x as $atributo => $valor) eval('$this->'.$atributo."('$valor');");
  }

  public function pk() { return ['entidade_id'=>$this->entidade_id]; }
  public function table_name() { return 'pessoa_juridica'; }

  public function entidade_id($x=null)  {
    if ($x===null) return $this->entidade_id;
    $this->entidade_id = $x;
  }

  public function cnpj($x=null)  {
    if($x===null) return $this->cnpj;
    $this->cnpj = $x;
  }

  public function razao_social($x=null)  {
    if($x===null) return $this->razao_social;
    $this->razao_social = $x;
  }

  public function fistel($x=null)  {
    if($x===null) return $this->fistel;
    $this->fistel = $x;
  }

  public function numero_entidade($x=null)  {
    if($x===null) return $this->numero_entidade;
    $this->numero_entidade = $x;
  }

  public function inscricao_estadual($x=null)  {
    if($x===null) return $this->inscricao_estadual;
    $this->inscricao_estadual = $x;
  }

  public function inscricao_municipal($x=null)  {
    if($x===null) return $this->inscricao_municipal;
    $this->inscricao_municipal = $x;
  }

}
