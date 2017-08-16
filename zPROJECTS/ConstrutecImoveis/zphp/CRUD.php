<?php
class CRUD {

  //==============================INSERT==============================\\

  public static function insert($tabela, $array_campos_valores) {
    $campos = implode(',', array_keys($array_campos_valores));
    $size = count($array_campos_valores);
    $valores = array_values($array_campos_valores);
    $interrogacoes = substr(str_repeat("?,", $size), 0, $size*2-1);
    $sql = Conexao::conectar()->prepare("INSERT INTO $tabela ($campos) VALUES ($interrogacoes);");
    $sql->execute($valores);
  }

  //==============================UPDATE==============================\\

  public static function update($tabela, $array_campos_valores,  $where, $parametros) {
    $campos = implode(' = ? , ', array_keys($array_campos_valores));
    $campos = $campos. ' = ? ';
    $valores = array_values($array_campos_valores);
    $valores =  array_merge($valores, $parametros);
    $sql = Conexao::conectar()->prepare("UPDATE $tabela SET $campos WHERE $where;");
    $sql->execute($valores);
  }

  //==============================DELETE==============================\\

  public static function delete($tabela, $where, $parametros){
    $sql = Conexao::conectar()->prepare("DELETE FROM $tabela WHERE $where;");
    $sql->execute($parametros);
  }

  //==============================SELECT GENERICO==============================\\

  public static function select($tabelas, $campos='*', $where='', $parametros) {
    $sql = Conexao::conectar()->prepare("SELECT $campos FROM $tabelas".($where==''?'':" WHERE ".$where).";");
    $sql->execute($parametros);
    return $sql->fetchAll(PDO::FETCH_ASSOC);
  }

}
// Conexao::conectar()->lastInsertId();

//======================SELECT ESCROTO======================//
// public static function select_animal_pesquisa_limit($especie, $estado, $cidade, $ini, $qnt) {
//   $sql = Conexao::conectar()->prepare(
//     "SELECT a.id, a.foto, a.nome FROM animal a, usuario u WHERE a.status = 0 AND a.usuario_id = u.id AND a.especie LIKE ? AND u.estado LIKE ? AND u.cidade LIKE ? LIMIT $ini, $qnt;"
//   );
//   $sql->execute(["%".$especie."%", "%".$estado."%", "%".$cidade."%"]);
//   return $sql->fetchAll(PDO::FETCH_ASSOC);
// }

//======================TRANSAÇÃO======================//
// public static function update_adocao_confirmada($id_pet, $id_adotante) {
//   $pdo = Conexao::conectar();
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
