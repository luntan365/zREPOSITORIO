<?php
class SuperEntidade {

  private $entidade = null;
  private $pessoa = null;
  private $categoria = [];
  private $endereco = [];
  private $conta_bancaria = [];
  private $contato = [];

  public function entidade(Entidade $x=null)  {
    if($x===null) return $this->entidade;
    $this->entidade = $x;
  }

  public function pessoa(Pessoa $x=null)  {
    if($x===null) return $this->pessoa;
    $this->pessoa = $x;
  }

  // Categorias
  public function categoria(Array $x=null)  {
    if($x===null) return $this->categoria;
    $this->categoria = $x;
  }
  public function categoria_adicionar(CategoriaEntidade $x)  {
    $this->categoria[] = $x;
  }

  // Endereços
  public function endereco(Array $x=null)  {
    if($x===null) return $this->endereco;
    $this->endereco = $x;
  }
  public function endereco_adicionar(Endereco $x)  {
    $this->endereco[] = $x;
  }

  // Contas Bancarias
  public function conta_bancaria(Array $x=null) {
    if($x===null) return $this->conta_bancaria;
    $this->conta_bancaria = $x;
  }
  public function conta_bancaria_adicionar(ContaBancaria $x)  {
    $this->conta_bancaria[] = $x;
  }

  // Contatos
  public function contato(Array $x=null) {
    if($x===null) return $this->contato;
    $this->contato = $x;
  }
  public function contato_adicionar(Contato $x)  {
    $this->contato[] = $x;
  }




}
