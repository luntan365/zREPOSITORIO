<?php

	include_once 'conexao.php';
	$pdo = conectar();

	//iniciar transação
	$pdo->beginTransaction();

	$consulta = consultando....
	//se der errado mate a execução
	if(!$consulta){
		die("erro ao consultar");//matando transação
	}

	$insercao = inserindo....
	//se der errado cancele a execuçoes anteriores e mate a execução
	if(!$insercao){
		$pdo->rollBack();
		die("erro ao inserir");//matando transação
	}

	$outraInsercao = inserindo....
	//se der errado cancele a execuçoes anteriores e mate a execução
	if(!$outraInsercao){
		$pdo->rollBack();
		die("erro na outra inserçao");//matando transação
	}

	//confirmção da transação
	$pdo->commit();

?>
