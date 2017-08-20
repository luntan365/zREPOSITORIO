<?php permissao_logado();
$dados_endereco = [];
$dados_endereco['rua'] = $_SESSION['cadastro']['rua'];
$dados_endereco['bairro'] = $_SESSION['cadastro']['bairro'];
$dados_endereco['categoria'] = $_SESSION['cadastro']['categoria'];
if (isset($_SESSION['cadastro']['referencia'])) {
  $dados_endereco['referencia'] = $_SESSION['cadastro']['referencia'];
}

CRUD::insert('endereco', $dados_endereco);
$endereco_id = CRUD::last_id();

foreach ($_SESSION['cadastro']['adicionados'] as $value) {
  $value['endereco_id'] = $endereco_id;
  CRUD::insert('imovel', $value);
}


$_SESSION['cadastro'] = [];
