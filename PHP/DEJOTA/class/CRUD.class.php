<?php
  class CRUD {

    private $con;

    function __construct(){
      try {
        $this->con = new PDO('mysql:dbname=petadote; host=localhost; charset=utf8','root','');
        $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch (PDOException $e) {
        throw new Exception($e->getMessage());
      }
    }

    //==============================INSERT=============================================\\

    public final function insert_usuario_pessoa($sexo, $nome, $email, $estado, $cidade, $telefone, $foto, $senha) {
      $sql = $this->con->prepare("INSERT INTO usuario (sexo, nome, email, estado, cidade, telefone, foto, senha, data, tipo) VALUES (?,?,?,?,?,?,?,?,?,?);");
      $sql->execute([$sexo, $nome, $email, $estado, $cidade, $telefone, $foto, md5($senha),  date('Y/m/d'), 'pessoa']);
    }

    public final function insert_usuario_instituicao($cnpj, $endereco, $nome, $email, $estado, $cidade, $telefone, $foto, $senha) {
      $sql = $this->con->prepare("INSERT INTO usuario (cnpj, endereco, nome, email, estado, cidade, telefone, foto, senha, data, tipo) VALUES (?,?,?,?,?,?,?,?,?,?,?);");
      $sql->execute([$cnpj, $endereco, $nome, $email, $estado, $cidade, $telefone, $foto, md5($senha),  date('Y/m/d'), 'instituicao']);
    }

    //============================UPDATE===============================================\\

    public final function update_data_acesso($id){
      $sql = $this->con->prepare("UPDATE usuario SET data = ? WHERE id = ?;");
      $sql->execute([date('Y-m-d'), $id]);
    }

    //===========================DELETE================================================\\

    public final function delete_usuario($id){
      $excluir = $this->con->prepare("DELETE FROM usuario WHERE id = ?;");
      $excluir->execute([$id]);
    }

    public final function delete_animal($id){
      $excluir = $this->con->prepare("DELETE FROM animal WHERE id = ?;");
      $excluir->execute([$id]);
    }

    //==========================SELECT=================================================\\

    public final function select_login($email, $senha) {
      $sql = $this->con->prepare("SELECT * FROM usuario WHERE email=? AND senha=?;");
      $sql->execute([$email, md5($senha)]);
      return $sql->fetch(PDO::FETCH_ASSOC);
    }
    public final function select_email_existe($email) {
      $sql = $this->con->prepare("SELECT * FROM usuario WHERE email=?;");
      $sql->execute([$email]);
      return $sql->fetch(PDO::FETCH_ASSOC);
    }
    public final function select_cnpj_existe($cnpj) {
      $sql = $this->con->prepare("SELECT * FROM usuario WHERE cnpj=?;");
      $sql->execute([$cnpj]);
      return $sql->fetch(PDO::FETCH_ASSOC);
    }

    public final function select_all($tabela) {
      $sql = $this->con->prepare("SELECT * FROM $tabela;");
      $sql->execute();
      return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    //===========================================================================\\

    //retorn o ultimo id inserido, usar para logar automaticamente depois registrar
    public function get_last_id_insert(){
      return $this->con->lastInsertId();
    }

  }
