<?php
private $dbname = 'banco';
private $host = 'localhost';
private $user = 'root';
private $pass = '';

$con = ("mysql:dbname=".$dbname."; host=".$host."; charset=utf8", $user, $pass);
$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//INSERT
$sql = $con->prepare('INSERT INTO pessoa (nome, idade) VALUES (?, ?);');
$sql->execute(['maria', 20]); //dados vao ser inseridos na mesma ordem que foram especificados

// UPDATE
$id = 1;
$sql = $con->prepare('UPDATE pessoa SET nome = ?, idade = ? WHERE id = ?;');
$sql->execute(['maria alterado', 20, $id]); //dados na mesma ordem das interrogações

// DELETE
$id = 1;
$sql = $con->prepare('DELETE FROM pessoa WHERE id = ?;');
$sql->execute([$id]);

//SELECT
$sql = $con->prepare('SELECT * FROM pessoa WHERE nome = ? AND idade > ?;');
$sql->execute(['maria', 18]);
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);//retorna um array com arrays

//pegando array q contem a primeira linha da pesquisa;
$primeiro_resultado = $resultado[0];
//os indices do array da resposta sao os nomes da coluna do banco a qual ele pertence
$nome = $primeiro_resultado['nome'];
$idade = $primeiro_resultado['idade'];

//percorrendo todas respostas
foreach ($resultado as $linha) {
  $nome = $linha['nome'];
  $idade = $linha['idade'];
  echo "Nome: $nome, idade: $idade";
}

//quando tiver duvida usar essa funcao
var_dump($resultado); //verifica estrutura de variaveis
