<?php
class ORM {

  public static function salvar(Entity &$entity) {
    $dados = self::object_for_array($entity);
    if(isset($dados['id'])) { unset($dados['id']); }
    foreach ($dados as $key => $value) { if (empty($value)) { unset($dados[$key]); } }
    self::insert($entity->table_name(), $dados);
    if (method_exists($entity,'id')) {
      $entity->id(Conexao::conectar()->lastInsertId());
    }
  }

  public static function alterar(Entity &$entity) {
    $dados = self::object_for_array($entity);
    if(isset($dados['id'])) { unset($dados['id']); }
    foreach ($dados as $key => $value) { if ($value===null) { unset($dados[$key]); } }
    self::update($entity->table_name(), $dados, $entity->pk());
  }

  public static function excluir(Entity &$entity) {
    self::delete($entity->table_name(), $entity->pk());
  }

  public static function buscar(Entity &$entity) {
    $dados = self::select($entity->table_name(), $entity->pk());
    if($dados === false) { $entity = null; return null; }
    $classe = get_class($entity);
    $entity = new $classe($dados);
  }

  private static function object_for_array(&$object) {
    $arrayobj = (array) $object;
    while ( list ($key, $value) = each ($arrayobj) ) {
        $aux = explode ("\0", $key);
        $newkey = $aux[count($aux)-1];
        $array[$newkey] = $arrayobj[$key];
    }
    return $array;
  }

  //==============================CRUD==============================\\

  private static function insert($tabela, $dados) {
    $campos = implode(',', array_keys($dados));
    $size = count($dados);
    $valores = array_values($dados);
    $interrogacoes = substr(str_repeat("?,", $size), 0, $size*2-1);
    $sql = Conexao::conectar()->prepare("INSERT INTO $tabela ($campos) VALUES ($interrogacoes);");
    $sql->execute($valores);
  }

  private static function update($tabela, $dados, $pks) {
    $campos = implode(' = ? , ', array_keys($dados));
    $campos = $campos. ' = ? ';
    $valor = array_values($dados);
    $pkwhere = implode(' = ? AND , ', array_keys($pks));
    $pkwhere = $pkwhere. ' = ?';
    $pkvalue = array_values($pks);
    $valores =  array_merge($valor, $pkvalue);
    $sql = Conexao::conectar()->prepare("UPDATE $tabela SET $campos WHERE $pkwhere;");
    $sql->execute($valores);
  }

  private static function delete($tabela, $pks) {
    $pkwhere = implode(' = ? AND , ', array_keys($pks));
    $pkwhere = $pkwhere. ' = ?';
    $pkvalue = array_values($pks);
    $sql = Conexao::conectar()->prepare("DELETE FROM $tabela WHERE $pkwhere;");
    $sql->execute($pkvalue);
  }

  private static function select($tabela, $pks) {
    $pkwhere = implode(' = ? AND , ', array_keys($pks));
    $pkwhere = $pkwhere. ' = ?';
    $pkvalue = array_values($pks);
    $sql = Conexao::conectar()->prepare("SELECT * FROM $tabela WHERE $pkwhere;");
    $sql->execute($pkvalue);
    return $sql->fetch(PDO::FETCH_ASSOC);
  }

}
