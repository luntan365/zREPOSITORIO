<?php
if (!$_SERVER['REQUEST_METHOD']=='POST') {  header("Location: ".DOMINIO); exit; }

$contabancaria = new ContaBancaria();
$contabancaria->banco_id($_POST['banco']);
$contabancaria->agencia($_POST['agencia']);
$contabancaria->numero_conta($_POST['numero_conta']);
$contabancaria->operacao($_POST['operacao']);
$contabancaria->observacoes($_POST['observacoes']);

$validar_contabancaria = ContaBancariaVLD::validar($contabancaria);

if ($validar_contabancaria) {
  $super_entidade = SESSION::ss('cadastro_superentidade');
  if ($super_entidade) { 
    $super_entidade->conta_bancaria_adicionar($contabancaria);
    SESSION::ss('cadastro_superentidade', $super_entidade);
    unset($_SESSION['cadastro_contabancaria']);
  }
  header("Location: ".DOMINIO."cadastro/cadastro2");
  exit;
} else {
  SESSION::ss('cadastro_contabancaria', $contabancaria);
  header("Location: ".DOMINIO."cadastro/cadastro2");
  exit;
}
