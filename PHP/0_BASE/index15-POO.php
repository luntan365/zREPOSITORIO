<?php
class Pai{
  protected $variavelPai;
}

class Pessoa extends Pai{
  # var = modo antigo declara variavel publica
  var $nome;
  public $idade;
  private $senha;

  function __construct($nome, $idade, $senha){
    //self usado para chamar menbros estaticos
    self::metodosEstatico();
    //$this usado para referenciar menbros de instancia
    $this -> nome = $nome;
    $this -> idade = $idade;
    $this -> senha = $senha;
    //so podemos estanciar qualquer classe dentro construtor
    //$this -> atributo = new Classe();
  }

  function __desctruct(){
    //sera executada quando a variavel for ser apagada da memoria
    //normalmente usada fechar conecxao banco de dados e socket
  }

  public function imprimir(){
      echo "Nome: " . $this -> nome;
      echo "<br>";
      echo "Idade: " . $this -> idade;
      echo "<br>";
      echo "Idade: " . $this -> senha;
      echo "<br>";

  }

  public function get_senha() : string { //tipando retorno
    return $this -> senha;
  }

  public function set_senha(string $senha) { //tipando parametro
    $this -> senha = $senha;
  }

  public static function metodosEstatico() {
    echo "metodosEstatico <br>";
  }

  //função recursiva
  public function fatorial(int $variavel){
    if ($variavel<0) {
    return -1;
    }elseif ($variavel==0) {
        return 1;
    }else {
      return $variavel * $this -> fatorial($variavel-1);
    }
  }

}
  //$p1 = new Pessoa; caso nao tenha parametros construtor
  $p1 = new Pessoa("Derrota", 17, "asdsa");
  $p1 -> imprimir();
  $p1 -> nome = "Dejota";
  $p1 -> idade = 27;
  $p1 -> imprimir();
  $p1 -> set_senha("0123");
  echo "Senha: {$p1 -> get_senha()}";
  $p1 -> imprimir();
  //chamar metodo statico
  Pessoa::metodosEstatico();
  //metodo Recursivo
  echo "Fatorial: " . $p1 -> fatorial(5);
