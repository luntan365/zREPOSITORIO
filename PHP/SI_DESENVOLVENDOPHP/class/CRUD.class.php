<?php
  class CRUD extends Conexao {

    private $query, $run;

    function __construct(){
      parent::__construct('mysql:dbname=cursophp; host=localhost; charset=utf8','root','');
    }

    private function set_statement($s){
      if(is_object(parent::get_conexao())):
        $this->query = parent::get_conexao()->prepare($s);
      else:
        die(parent::get_error());
      endif;
    }

    private function do_run(){
      $this->query->execute($this->run);
    }

    public function run($r=[]){
      $this->run = $r;
      $this->do_run();
      return $this->query;
    }

    public final function insert($tabela, $valores){
      $this->set_statement("INSERT INTO ".$tabela." SET ".$valores.";");
      return $this;
    }

    public final function select($tabela, $campos="*", $condicao=""){
      $this->set_statement("SELECT ".$campos." FROM ".$tabela." ".$condicao.";");
      return $this;
    }

    public final function update($tabela, $valores, $condicao){
      $this->set_statement("UPDATE ".$tabela." SET ".$valores." ".$condicao.";");
      return $this;
    }

    public final function delete($tabela, $condicao){
      $this->set_statement("DELETE FROM ".$tabela." ".$condicao.";");
      return $this;
    }


    // public function get_last_id_insert(){ //ja logar automaticamente depois registrar
    //   return parent::get_conexao()->lastInsertId();
    // }

  }
