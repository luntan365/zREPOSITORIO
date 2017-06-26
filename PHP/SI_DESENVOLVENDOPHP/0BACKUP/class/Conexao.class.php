<?php
class Conexao extends CriarArquivo implements iConexao {

  private $dsn, $user, $pass, $conexao, $error_error_conexao;

  function __construct($dsn='mysql:dbname=cursophp; host=localhost; port=3306; charset=utf8',$user='root',$pass=''){
    $this->dsn  = $dsn;
    $this->user = $user;
    $this->pass = $pass;

    $this->conectar();
  }

  public function conectar(){
    try {
      $this->conexao = new PDO($this->dsn, $this->user, $this->pass);
    } catch (PDOException $e) {
      $this->error_conexao = 'Erro no sistema, falha ao estabelecer conexão com banco de dados.';
      parent::criar_arquivo('log/', 0700, 'log_con.txt', 'a', $e->getMessage().PHP_EOL.'OCORREU UM ERRO NA LINHA: '.$e->getLine());
    }
  }

  public function get_conexao(){
    return $this->conexao;
  }

  public function get_error(){
    return '<pre class=error>'.$this->error_conexao.'</pre>';
  }



}
