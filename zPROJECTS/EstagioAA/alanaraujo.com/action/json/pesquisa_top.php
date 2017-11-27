<?php

header('Cache-Control: no-cache, must-revalidate');
header('Content-Type: application/json; charset=utf-8');

$pesquisa = json_decode($_POST['json'], true);
$pesquisa = $pesquisa['pesquisa'];
$consulta = CRUD::select('entidade', 'id, nome', 'nome LIKE ? ORDER BY CHAR_LENGTH(nome) LIMIT 100', '%'.$pesquisa.'%');
echo json_encode($consulta);
