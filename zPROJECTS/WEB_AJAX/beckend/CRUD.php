<?php
class CRUD {
  
  private static $conexao;

  private static function conectar() {
    if (!isset(self::$conexao)) {
      try {
        self::$conexao = new PDO("mysql:dbname=alanaraujo; host=localhost; charset=utf8", 'root', '');
        self::$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch (PDOException $e) {
        throw new Exception("CRUD: ".$e->getMessage());
        exit;
      }
    }
  }

  public static function conexao() {
    return self::$conexao;
  }

  //==============================INSERT==============================\\

  public static function insert($tabela, $array_campos_valores) {
    self::conectar();
    $campos = implode(',', array_keys($array_campos_valores));
    $size = count($array_campos_valores);
    $valores = array_values($array_campos_valores);
    $interrogacoes = substr(str_repeat("?,", $size), 0, $size*2-1);
    $sql = self::$conexao->prepare("INSERT INTO $tabela ($campos) VALUES ($interrogacoes);");
    $sql->execute($valores);
    return self::$conexao->lastInsertId();
  }

  //==============================UPDATE==============================\\

  public static function update($tabela, $array_campos_valores,  $where, ...$parametros) {
    self::conectar();
    $campos = implode(' = ? , ', array_keys($array_campos_valores));
    $campos = $campos. ' = ? ';
    $valores = array_values($array_campos_valores);
    $valores =  array_merge($valores, $parametros);
    $sql = self::$conexao->prepare("UPDATE $tabela SET $campos WHERE $where;");
    $sql->execute($valores);
  }

  //==============================DELETE==============================\\

  public static function delete($tabela, $where, ...$parametros){
    self::conectar();
    $sql = self::$conexao->prepare("DELETE FROM $tabela WHERE $where;");
    $sql->execute($parametros);
  }

  //==============================SELECT GENERICO==============================\\

  public static function select($tabelas, $campos='*', $where='', ...$parametros) {
    self::conectar();
    $sql = self::$conexao->prepare("SELECT $campos FROM $tabelas".($where==''?'':" WHERE ".$where).";");
    $sql->execute($parametros);
    return $sql->fetchAll(PDO::FETCH_ASSOC);
  }

}

//======================SELECT ESCROTO======================//
// public static function select_animal_pesquisa_limit($especie, $estado, $cidade, $ini, $qnt) {
//   $sql = self::$conexao->prepare(
//     "SELECT a.id, a.foto, a.nome FROM animal a, usuario u WHERE a.status = 0 AND a.usuario_id = u.id AND a.especie LIKE ? AND u.estado LIKE ? AND u.cidade LIKE ? LIMIT $ini, $qnt;"
//   );
//   $sql->execute(["%".$especie."%", "%".$estado."%", "%".$cidade."%"]);
//   return $sql->fetchAll(PDO::FETCH_ASSOC);
// }


//======================TRANSAÇÃO======================//
// public static function update_adocao_confirmada($id_pet, $id_adotante) {
//   $pdo = self::$conexao;
//   $pdo->beginTransaction();
//
//   $sql = $pdo->prepare("UPDATE adocao SET status = ? WHERE animal_id = ? AND usuario_id = ?;");
//   if (!$sql->execute(["Aceito", $id_pet, $id_adotante])) { throw new Exception("Erro na confirmacão da adoção.");  }
//
//   $sql = $pdo->prepare("UPDATE animal SET status = ? WHERE id = ?;");
//   if (!$sql->execute([1 ,$id_pet])) { $pdo->rollBack();  throw new Exception("Erro na confirmacão da adoção."); }
//
//   $sql = $pdo->prepare("UPDATE adocao SET status = ? WHERE animal_id = ? AND usuario_id <> ?;");
//   if (!$sql->execute(["Rejeitado", $id_pet, $id_adotante])) { $pdo->rollBack();  throw new Exception("Erro na confirmacão da adoção.");  }
//
//   return $pdo->commit();
// }
