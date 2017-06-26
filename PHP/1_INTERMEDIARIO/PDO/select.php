<?php

	include_once 'conexao.php';
	$pdo = conectar();

	// $select = $pdo->prepare("SELECT * FROM contatos WHERE id=?");
	// $select->execute(array(94));
	// echo $select->rowCount();

	// $select = $pdo->prepare("SELECT * FROM contatos WHERE id=?");
	// $select->bindValue(1, 94, PDO::PARAM_INT);
	// $select->execute();

	// $select = $pdo->prepare("SELECT * FROM contatos WHERE id=:id");
	// $select->bindValue(":id", 94, PDO::PARAM_INT);
	// $select->execute();

	$select = $pdo->prepare("SELECT * FROM contatos");
	$select->execute();

	$select = $select->fetchAll(PDO::FETCH_ASSOC);

	foreach ($select as $value) {
	  foreach ($value as $key =>$value2) {
	    echo "$key = $value2 <br>";
	  }
	  echo "<br>";
	}
