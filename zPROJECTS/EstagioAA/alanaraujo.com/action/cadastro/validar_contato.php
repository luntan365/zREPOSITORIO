<?php
if (!$_SERVER['REQUEST_METHOD']=='POST') {  header("Location: ".DOMINIO); exit; }

$contato = new Contato();
$contato->categoria_contato_id($_POST['categoria_contato']);
$contato->contato($_POST['contato']);
$contato->observacoes($_POST['observacoes']);

$validar_contato = ContatoVLD::validar($contato);

if ($validar_contato) {
  $super_entidade = SESSION::ss('cadastro_superentidade');
  if ($super_entidade) { 
    $super_entidade->contato_adicionar($contato);
    SESSION::ss('cadastro_superentidade', $super_entidade);
    unset($_SESSION['cadastro_contato']);  
  }
  header("Location: ".DOMINIO."cadastro/cadastro2");
  exit;
} else {
  SESSION::ss('cadastro_contato', $contato);
  header("Location: ".DOMINIO."cadastro/cadastro2");
  exit;
}
