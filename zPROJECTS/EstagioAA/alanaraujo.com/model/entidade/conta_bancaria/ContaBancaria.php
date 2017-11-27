<?php
class ContaBancaria implements Entity {

  private $id = null;
  private $agencia = null;
  private $numero_conta = null;
  private $operacao = null;
  private $observacoes = null;
  private $banco_id = null;
  private $entidade_id = null;

  public function __construct($x=null)  {
    if($x===null) return;
    foreach ($x as $atributo => $valor) eval('$this->'.$atributo."('$valor');");
  }

  public function pk() { return ['id'=>$this->id]; }
  public function table_name() { return 'conta_bancaria'; }

  public function id($x=null) {
    if($x===null) return $this->id;
    $this->id = $x;
  }

  public function agencia($x=null) {
    if($x===null) return $this->agencia;
    $this->agencia = $x;
  }

  public function numero_conta($x=null) {
    if($x===null) return $this->numero_conta;
    $this->numero_conta = $x;
  }

  public function operacao($x=null) {
    if($x===null) return $this->operacao;
    $this->operacao = $x;
  }

  public function observacoes($x=null) {
    if($x===null) return $this->observacoes;
    $this->observacoes = $x;
  }

  public function banco_id($x=null) {
    if($x===null) return $this->banco_id;
    $this->banco_id= $x;
  }

  public function entidade_id($x=null) {
    if($x===null) return $this->entidade_id;
    $this->entidade_id= $x;
  }


}
