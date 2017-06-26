<?php

	function anti_injection($sql){
		$sql = htmlspecialchars($sql);
		$sql = addslashes(trim($sql));		
		return $sql;
	}

	include_once 'conexao.php';
	$pdo = conectar();

	$nome = anti_injection('dejota <br> <h1>coelho</h1>');
	$email = anti_injection('dejota@email.com <img src="">');

	$sql = $pdo->prepare("UPDATE contatos SET nome=:nome, email=:email WHERE id=:id");
	$sql->bindValue(":nome", $nome, PDO::PARAM_STR);
	$sql->bindValue(":email", $email, PDO::PARAM_STR);
	$sql->bindValue(":id", 92, PDO::PARAM_INT);
	$executou = $sql->execute();
	echo $executou;

	echo "<br>";
	include_once 'select.php';

?>
