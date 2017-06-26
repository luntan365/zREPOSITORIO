<?php
  class DB {

    private $con;

    function __construct(){
      try {
        $this->con = new PDO('mysql:dbname=petadote; host=localhost; charset=utf8','root','');
        $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch (PDOException $e) {
        throw new Exception($e->getMessage());
      }
    }

    //===========================================================================\\

    public final function insert($tabela, $dados = array()) {
      $campos = implode(", ", array_keys($dados));
      for ($i=0; $i < count($dados); $i++):
        $valores[$i] = "?";
      endfor;
      $valores = implode(", ",$valores);
      $sql = $this->con->prepare("INSERT INTO $tabela ($campos) VALUES ($valores);");
      var_dump($sql);
      $sql->execute(array_values($dados));
    }

    //===========================================================================\\

    public final function update($tabela, $dados = array(), $id){
      $campos = array_keys($dados);
      for ($i=0; $i < count($campos); $i++):
        $campos[$i] = $campos[$i]."= ?";
      endfor;
      $campos = implode(", ",$campos);
      $sql = $this->con->prepare("UPDATE $tabela SET $campos WHERE id = ?;");
      $valores = array_values($dados);
      $valores[] = $id;
      $sql->execute($valores);
    }
    //===========================================================================\\

    public final function delete($tabela, $id){
      $excluir = $this->con->prepare("DELETE FROM $tabela WHERE id = ?;");
      $excluir->execute($id);
    }

    //===========================================================================\\

    public final function select($tabela, $where = array(), $campos = "*") {
      if (empty($where)) {

        $sql = $this->con->prepare("SELECT $campos FROM $tabela;");
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);

      } else {

        $wherecampos = array_keys($where);
        for ($i=0; $i < count($wherecampos); $i++):
          $wherecampos[$i] = $wherecampos[$i]."= ?";
        endfor;
        $wherecampos = "WHERE ".implode(" AND ",$wherecampos);
        $sql = $this->con->prepare("SELECT $campos FROM $tabela $wherecampos;");
        $sql->execute(array_values($where));
        return $sql->fetchAll(PDO::FETCH_ASSOC);

      }

    }
    // GUIA COMO USAR
    // $dados['email'] = $_POST['email'];
    // $dados['senha'] = $_POST['senha'];
    // $c1 = $crud->select("usuario_pessoa", $dados);
    // $c2 = $crud->select("usuario_pessoa");
    // $c3 = $crud->select("usuario_pessoa", array(), 'id, nome, email');

    //===========================================================================\\

    //retorn o ultimo id inserido, usar para logar automaticamente depois registrar
    public function get_last_id_insert(){
      return $this->con->lastInsertId();
    }

  }
