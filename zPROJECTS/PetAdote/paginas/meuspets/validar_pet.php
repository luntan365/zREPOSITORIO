<?php
if (!$_SERVER['REQUEST_METHOD']=='POST') {  header("Location: ".DOMINIO); }
$validado_ok = true;

//===================================================================\\
if ($_SESSION['usuario']['tipo'] == 'pessoa' && count($crud->select_lista_meuspets($_SESSION['usuario']['id']))>=5) {
  $_SESSION['limite_pets'] = "Sinto muito, mas você só poderá ter até 5 pets disponíveis para adoção";
  $validado_ok = false;
}
//===================================================================\\
if (isset($_POST['especie'])):
  try {
    $especie = Valida::texto($_POST['especie'], 100);
  } catch (Exception $e) {
    $_SESSION['erro_validacao_especie'] = $e->getMessage();
    $validado_ok = false;
  }
endif;
//=======================================================
if (isset($_POST['nome'])):
  try {
    $nome = Valida::texto($_POST['nome'], 45);
  } catch (Exception $e) {
    $_SESSION['erro_validacao_nome'] = $e->getMessage();
    $validado_ok = false;
  }
endif;
//=======================================================
if (isset($_POST['idade'])):
  try {
    $idade = Valida::numero_inteiro($_POST['idade'], 3);
  } catch (Exception $e) {
    $_SESSION['erro_validacao_idade'] = $e->getMessage();
    $validado_ok = false;
  }
endif;
//=======================================================
if (isset($_POST['raca'])):
  try {
    $raca = Valida::texto($_POST['raca'], 45);
  } catch (Exception $e) {
    $_SESSION['erro_validacao_raca'] = $e->getMessage();
    $validado_ok = false;
  }
endif;
//=======================================================
if (isset($_POST['descricao'])):
  try {
    $descricao = Valida::texto($_POST['descricao'], 1000);
  } catch (Exception $e) {
    $_SESSION['erro_validacao_descricao'] = $e->getMessage();
    $validado_ok = false;
  }
endif;
//===================================================================\\
  if ($validado_ok) {
    try {
      $foto = new UploadImagem('foto','img/pets', 200, 200);
    } catch (Exception $e) {
      $_SESSION['erro_validacao_foto'] = $e->getMessage();
      $validado_ok = false;
    }
  }
  if ($validado_ok):
    try {
      $crud->insert_animal($nome, $idade, $raca, $descricao, $especie, $_SESSION['usuario']['id'], $foto);
    } catch (Exception $e) {
      unlink(str_replace('\\', '/', DIR_RAIZ).'/'.$foto);
    if (isset($especie)): $_SESSION['salvo_valida_especie'] = $especie; endif;
    if (isset($nome)): $_SESSION['salvo_valida_nome'] = $nome; endif;
    if (isset($idade)): $_SESSION['salvo_valida_idade'] = $idade; endif;
    if (isset($raca)): $_SESSION['salvo_valida_raca'] = $raca; endif;
    if (isset($descricao)): $_SESSION['salvo_valida_descricao'] = $descricao; endif;
    }
  else:
    if (isset($especie)): $_SESSION['salvo_valida_especie'] = $especie; endif;
    if (isset($nome)): $_SESSION['salvo_valida_nome'] = $nome; endif;
    if (isset($idade)): $_SESSION['salvo_valida_idade'] = $idade; endif;
    if (isset($raca)): $_SESSION['salvo_valida_raca'] = $raca; endif;
    if (isset($descricao)): $_SESSION['salvo_valida_descricao'] = $descricao; endif;
  endif;

header("Location: ".DOMINIO."meuspets");
