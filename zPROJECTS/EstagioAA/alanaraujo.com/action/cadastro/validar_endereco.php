<?php
if (!$_SERVER['REQUEST_METHOD']=='POST') {  header("Location: ".DOMINIO); exit; }

$endereco = new Endereco();
$endereco->rua($_POST['rua']);
$endereco->numero($_POST['numero']);
$endereco->bairro($_POST['bairro']);
$endereco->cep($_POST['cep']);
$endereco->complemento($_POST['complemento']);
$endereco->observacoes($_POST['observacoes']);
$endereco->cidade_id($_POST['cidade']);

$_SESSION['cadastro_endereco_estado'] = $_POST['estado'];
$_SESSION['cadastro_endereco_pais'] = $_POST['pais'];

$validar_endereco = EnderecoVLD::validar($endereco);

if ($validar_endereco) {
  $super_entidade = SESSION::ss('cadastro_superentidade');
  if ($super_entidade) {
    $super_entidade->endereco_adicionar($endereco);
    SESSION::ss('cadastro_superentidade', $super_entidade);
    unset($_SESSION['cadastro_endereco']);
    unset($_SESSION['cadastro_endereco_estado']);
    unset($_SESSION['cadastro_endereco_pais']);
  }
  header("Location: ".DOMINIO."cadastro/cadastro2");
  exit;
} else {
  SESSION::ss('cadastro_endereco', $endereco);
  header("Location: ".DOMINIO."cadastro/cadastro2");
  exit;
}
