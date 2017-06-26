<?php
  class CRUD {

    private $con;

    function __construct(){
      try {
        $this->con = new PDO('mysql:dbname=petadote; host=localhost; charset=utf8','root','root');
        $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch (PDOException $e) {
        throw new Exception($e->getMessage());
      }
    }

    //==============================INSERT=============================================\\

    public function insert_usuario_pessoa($sexo, $nome, $email, $estado, $cidade, $telefone, $foto, $senha) {
      $sql = $this->con->prepare("INSERT INTO usuario (sexo, nome, email, estado, cidade, telefone, foto, senha, data, tipo) VALUES (?,?,?,?,?,?,?,?,?,?);");
      return $sql->execute([$sexo, $nome, $email, $estado, $cidade, $telefone, $foto, md5($senha),  date('Y/m/d'), 'pessoa']);
    }

    public function insert_usuario_instituicao($cnpj, $endereco, $nome, $email, $estado, $cidade, $telefone, $foto, $senha) {
      $sql = $this->con->prepare("INSERT INTO usuario (cnpj, endereco, nome, email, estado, cidade, telefone, foto, senha, data, tipo) VALUES (?,?,?,?,?,?,?,?,?,?,?);");
      return $sql->execute([$cnpj, $endereco, $nome, $email, $estado, $cidade, $telefone, $foto, md5($senha),  date('Y/m/d'), 'instituicao']);
    }

    public function insert_animal($nome, $idade, $raca, $descricao, $especie, $usuario, $foto) {
      $sql = $this->con->prepare("INSERT INTO animal (nome, idade, raca, descricao, especie, usuario_id, foto, status) VALUES (?,?,?,?,?,?,?,?);");
      return $sql->execute([$nome, $idade, $raca, $descricao, $especie, $usuario, $foto, 0]);
    }

    public function insert_adocao($id_pet, $id_usuario) {
      $sql = $this->con->prepare("INSERT INTO adocao (animal_id, usuario_id, data, status) VALUES (?,?,?,?);");
      return $sql->execute([$id_pet, $id_usuario, date('Y/m/d'), 'Aguardando']);
    }

    //============================UPDATE===============================================\\
    public function update_data_acesso($id){
      $sql = $this->con->prepare("UPDATE usuario SET data = ? WHERE id = ?;");
      return $sql->execute([date('Y-m-d'), $id]);
    }
    public function update_usuario_email($id, $email) {
      $sql = $this->con->prepare("UPDATE usuario SET email = ? WHERE id = ?;");
      return $sql->execute([$email, $id]);
    }
    public function update_usuario_senha($id, $senha) {
      $sql = $this->con->prepare("UPDATE usuario SET senha = ? WHERE id = ?;");
      return $sql->execute([md5($senha), $id]);
    }
    public function update_usuario_foto($id, $foto) {
      $sql = $this->con->prepare("UPDATE usuario SET foto = ? WHERE id = ?;");
      return $sql->execute([$foto, $id]);
    }
    public function update_usuario_dados_pessoa($id, $sexo, $nome, $estado, $cidade, $telefone) {
      $sql = $this->con->prepare("UPDATE usuario SET sexo=?, nome=?, estado=?, cidade=?, telefone=?  WHERE id = ?;");
      return $sql->execute([$sexo, $nome, $estado, $cidade, $telefone, $id]);
    }
    public function update_usuario_dados_instituicao($id, $cnpj, $endereco, $nome, $estado, $cidade, $telefone) {
      $sql = $this->con->prepare("UPDATE usuario SET cnpj = ?, endereco = ?, nome=?, estado=?, cidade=?, telefone=? WHERE id = ?;");
      return $sql->execute([$cnpj, $endereco, $nome, $estado, $cidade, $telefone, $id]);
    }

    public function update_adocao_confirmada($id_pet, $id_adotante) {
      $pdo = $this->con;
      $pdo->beginTransaction();

      $sql = $pdo->prepare("UPDATE adocao SET status = ? WHERE animal_id = ? AND usuario_id = ?;");
      if (!$sql->execute(["Aceito", $id_pet, $id_adotante])) { $pdo->rollBack();  throw new Exception("Erro na confirmacão da adoção.");  }

      $sql = $pdo->prepare("UPDATE animal SET status = ? WHERE id = ?;");
      if (!$sql->execute([1 ,$id_pet])) { $pdo->rollBack();  throw new Exception("Erro na confirmacão da adoção."); }

      $sql = $pdo->prepare("UPDATE adocao SET status = ? WHERE animal_id = ? AND usuario_id <> ?;");
      if (!$sql->execute(["Rejeitado", $id_pet, $id_adotante])) { $pdo->rollBack();  throw new Exception("Erro na confirmacão da adoção.");  }

      $pdo->commit();
      return true;
    }

    //===========================DELETE================================================\\

    public function delete_usuario($id){
      $excluir = $this->con->prepare("DELETE FROM usuario WHERE id = ?;");
      return $excluir->execute([$id]);
    }

    public function delete_animal($id, $id_usuario){
      $excluir = $this->con->prepare("DELETE FROM animal WHERE id = ? AND usuario_id = ?;");
      return $excluir->execute([$id, $id_usuario]);
    }

    public function delete_adocao_lista($id_pet, $id_usuario) {
      $sql = $this->con->prepare("DELETE FROM adocao WHERE animal_id = ? AND usuario_id = ?;");
      return $sql->execute([$id_pet, $id_usuario]);
    }
    //==========================SELECT=================================================\\

    public function select_login($email, $senha) {
      $sql = $this->con->prepare("SELECT * FROM usuario WHERE email=? AND senha=?;");
      $sql->execute([$email, md5($senha)]);
      return $sql->fetch(PDO::FETCH_ASSOC);
    }

    public function select_usuario_id($id) {
      $sql = $this->con->prepare("SELECT * FROM usuario WHERE id=?;");
      $sql->execute([$id]);
      return $sql->fetch(PDO::FETCH_ASSOC);
    }

    public function select_atualizar_perfil($id) {
      $sql = $this->con->prepare("SELECT * FROM usuario WHERE id=?;");
      $sql->execute([$id]);
      return $sql->fetch(PDO::FETCH_ASSOC);
    }

    public function select_adotante_usuario_id($id) {
      $sql = $this->con->prepare("SELECT id, foto, nome FROM usuario WHERE id=?;");
      $sql->execute([$id]);
      return $sql->fetch(PDO::FETCH_ASSOC);
    }

    public function select_email_existe($email) {
      $sql = $this->con->prepare("SELECT * FROM usuario WHERE email=?;");
      $sql->execute([$email]);
      return $sql->fetch(PDO::FETCH_ASSOC);
    }

    public function select_lista_meuspets($id) {
      $sql = $this->con->prepare("SELECT * FROM animal WHERE usuario_id = ? AND status = ?;");
      $sql->execute([$id, '0']);
      return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function select_pet_foto($id) {
      $sql = $this->con->prepare("SELECT foto FROM animal WHERE  id = ?;");
      $sql->execute([$id]);
      return $sql->fetch(PDO::FETCH_ASSOC);
    }

    public function select_pet_id_dono($id) {
      $sql = $this->con->prepare("SELECT usuario_id FROM animal WHERE  id = ?;");
      $sql->execute([$id]);
      return $sql->fetch(PDO::FETCH_ASSOC);
    }

    public function select_pet_id($id) {
      $sql = $this->con->prepare("SELECT * FROM animal WHERE  id = ?;");
      $sql->execute([$id]);
      return $sql->fetch(PDO::FETCH_ASSOC);
    }

    public function select_adotantes_pet_id($id) {
      $sql = $this->con->prepare("SELECT id, nome, foto FROM animal WHERE  id = ?;");
      $sql->execute([$id]);
      return $sql->fetch(PDO::FETCH_ASSOC);
    }

    public function select_animal_pesquisa_limit($especie, $estado, $cidade, $ini, $qnt) {
      $sql = $this->con->prepare(
        "SELECT a.id, a.foto, a.nome FROM animal a, usuario u WHERE a.status = 0 AND a.usuario_id = u.id AND a.especie LIKE ? AND u.estado LIKE ? AND u.cidade LIKE ? LIMIT $ini, $qnt;"
      );
      $sql->execute(["%".$especie."%", "%".$estado."%", "%".$cidade."%"]);
      return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function select_animal_pesquisa_logado_limit($id_usuario, $especie, $estado, $cidade, $ini, $qnt) {
      $sql = $this->con->prepare(
        "SELECT a.id, a.foto, a.nome FROM animal a, usuario u WHERE a.status = 0 AND a.usuario_id = u.id AND a.usuario_id <> ? AND a.especie LIKE ? AND u.estado LIKE ? AND u.cidade LIKE ? LIMIT $ini, $qnt;"
      );
      $sql->execute([$id_usuario, "%".$especie."%", "%".$estado."%", "%".$cidade."%"]);
      return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function select_adocao_lista_esta($id_pet, $id_usuario) {
      $sql = $this->con->prepare("SELECT status FROM adocao WHERE animal_id = ? AND usuario_id = ?;");
      $sql->execute([$id_pet, $id_usuario]);
      return $sql->fetch(PDO::FETCH_ASSOC);
    }

    public function select_adocoes_usuario_id($id_usuario) {
      $sql = $this->con->prepare("SELECT * FROM adocao WHERE usuario_id = ?;");
      $sql->execute([$id_usuario]);
      return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function select_adotantes_pets($id_usuario) {
      $sql = $this->con->prepare("SELECT d.animal_id, d.usuario_id FROM adocao d, animal a WHERE d.animal_id = a.id AND a.usuario_id = ? AND d.status = ? ORDER BY d.animal_id, d.usuario_id;");
      $sql->execute([$id_usuario, "Aguardando"]);
      return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function select_usuario_adotante_meupet($id_usuario, $id_adotante) {
      $sql = $this->con->prepare("SELECT d.usuario_id FROM adocao d, animal a, usuario u WHERE a.usuario_id = ? AND d.usuario_id = ? AND  d.animal_id = a.id;");
      $sql->execute([$id_usuario, $id_adotante]);
      return $sql->fetch(PDO::FETCH_ASSOC);
    }

    public function select_verificar_meu_pet($id_pet, $id_user) {
      $sql = $this->con->prepare("SELECT id FROM animal WHERE id = ? AND usuario_id = ? AND status = ?;");
      $sql->execute([$id_pet, $id_user, '0']);
      return $sql->fetch(PDO::FETCH_ASSOC);
    }

    public function select_verificar_esta_lista_adocao($id_pet, $id_adotante) {
      $sql = $this->con->prepare("SELECT status FROM adocao WHERE animal_id = ? AND usuario_id = ? AND status = ?;");
      $sql->execute([$id_pet, $id_adotante, 'Aguardando']);
      return $sql->fetch(PDO::FETCH_ASSOC);
    }

    public function select_doacoes_concluidas($id_usuario) {
      $sql = $this->con->prepare("SELECT d.usuario_id, d.animal_id FROM adocao d, animal a WHERE d.animal_id = a.id AND a.usuario_id = ? AND d.status = ?;");
      $sql->execute([$id_usuario, "Aceito"]);
      return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function select_tabela_all($tabela) {
      $sql = $this->con->prepare("SELECT * FROM $tabela;");
      $sql->execute([]);
      return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function select_tabela_limit($tabela, $incio, $fim) {
      $sql = $this->con->prepare("SELECT * FROM $tabela LIMIT $incio, $fim;");
      $sql->execute([]);
      return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    //===========================================================================\\

    //retorn o ultimo id inserido, usar para logar automaticamente depois registrar
    public function get_last_id_insert(){
      return $this->con->lastInsertId();
    }

  }
