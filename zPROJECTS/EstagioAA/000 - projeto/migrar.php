<?php
//
// function get_con_ori(){
//   $con = new PDO('mysql:dbname=estados-cidades; host=localhost; charset=utf8','root','');
//   $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//   return $con;
// }
//
// function get_con_des(){
//   $con = new PDO('mysql:dbname=alanaraujo; host=localhost; charset=utf8','root','');
//   $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//   return $con;
// }
//=========================================================================\\
//
// function select_pais() {
//   $sql = get_con_ori()->prepare("SELECT * FROM pais ORDER BY descricao");
//   $sql->execute([]);
//   return $sql->fetchAll(PDO::FETCH_ASSOC);
// }
//
// function insert_pais($id, $descricao) {
//   $sql = get_con_des()->prepare("INSERT INTO pais (id, descricao) VALUES (?,?);");
//   return $sql->execute([$id, $descricao]);
// }
//
// $paises = select_pais();
// foreach ($paises as $value) {
//   var_dump($value);
//   insert_pais($value['id'], $value['descricao']);
// }

//=========================================================================\\
//
// function select_estado() {
//   $sql = get_con_ori()->prepare("SELECT * FROM estado ORDER BY id;");
//   $sql->execute([]);
//   return $sql->fetchAll(PDO::FETCH_ASSOC);
// }
//
// function insert_estado($id, $descricao, $pais_id) {
//   $sql = get_con_des()->prepare("INSERT INTO estado (id, descricao, pais_id) VALUES (?,?,?);");
//   return $sql->execute([$id, $descricao, $pais_id]);
// }
//
// $estados = select_estado();
// foreach ($estados as $value) {
//   var_dump($value);
//   insert_estado($value['id'], $value['descricao'], $value['pais_id']);
// }

//=========================================================================\\
//
// function select_cidade($estado_id) {
//   $sql = get_con_ori()->prepare("SELECT * FROM cidade WHERE estado_id = ? ORDER BY descricao;");
//   $sql->execute([$estado_id]);
//   return $sql->fetchAll(PDO::FETCH_ASSOC);
// }
//
// function insert_cidade($descricao, $estado_id) {
//   $sql = get_con_des()->prepare("INSERT INTO cidade (descricao, estado_id) VALUES (?,?);");
//   return $sql->execute([$descricao, $estado_id]);
// }
//
//
//   $cidades = select_cidade(27);
//   foreach ($cidades as $value) {
//     try {
//       echo $value['descricao']."<br>";
//       insert_cidade($value['descricao'], $value['estado_id']);
//     } catch (Exception $e) { echo e; }
//   }


echo "FIM!!!";
?>
