<?php

// var_dump($crud);

// $crud->insert("tbl_user", "user = ?, mail = ?, pass= ?")->run(['dejota', 'dejota@mail.com', '0123']);

// $up = $crud->update("tbl_user", "user = ?, mail = ?, pass= ?", "WHERE id = ?")->run(['taynan', 'tay@mail.com', '3210', 1]);
// print($up->rowCount()."<br>"); // if $up->rowCount() != 0 : atualizado com sucesso! endif;

// $del = $crud->delete("tbl_user", "WHERE id = ?")->run([7]);
// $del = $crud->delete("tbl_user", "WHERE id IN (?,?,?)")->run([1,2,3]); //excluindo varios
// print($del->rowCount()."<br>");// if $up->rowCount() != 0 : deletado com sucesso! endif;

$consulta = $crud->select("tbl_user")->run();
// $consulta = $crud->select("tbl_user", "*", "WHERE id = ?")->run([1]);
$consulta->setFetchMode(PDO::FETCH_ASSOC);
$consulta = $consulta->fetchAll();
foreach ($consulta as $values) {
  foreach ($values as $key => $value) {
    print($key.":".$value."---");
  }
  print("<br>");
}
