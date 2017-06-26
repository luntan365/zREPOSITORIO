<?php

	include_once 'conexao.php';
	$pdo = conectar();


	$sql = $pdo->prepare("DELETE FROM contatos WHERE id=?");
	$sql->bindValue(1, 92, PDO::PARAM_INT);
	$executou = $sql->execute();
	echo $executou;

	echo "<br>";
	include_once 'select.php';

?>
