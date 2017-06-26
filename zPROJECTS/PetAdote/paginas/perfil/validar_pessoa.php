<?php
if (!isset($_SESSION['usuario']['id'])) { header("Location: ".DOMINIO); }
if (!$_SERVER['REQUEST_METHOD']=='POST') {  header("Location: ".DOMINIO); }

  $validado_ok = true;

  //===================================================================\\
  if (isset($_POST['sexo'])):
    try {
      $sexo = Valida::texto($_POST['sexo']);
    } catch (Exception $e) {
      $_SESSION['erro_validacao_sexo'] = $e->getMessage();
      $validado_ok = false;
    }
  else:
    $_SESSION['erro_validacao_sexo'] = "Campo está vazio";
    $validado_ok = false;
  endif;
  //===================================================================\\
  if (isset($_POST['nome'])):
    try {
      $nome = Valida::texto($_POST['nome']);
    } catch (Exception $e) {
      $_SESSION['erro_validacao_nome'] = $e->getMessage();
      $validado_ok = false;
    }
  endif;
  //===================================================================\\
  if (isset($_POST['estado'])):
    try {
      $estado = Valida::texto($_POST['estado'], 2);
    } catch (Exception $e) {
      $_SESSION['erro_validacao_estado'] = $e->getMessage();
      $validado_ok = false;
    }
  endif;
  //===================================================================\\
  if (isset($_POST['cidade'])):
    try {
      $cidade = Valida::texto($_POST['cidade'], 100);
    } catch (Exception $e) {
      $_SESSION['erro_validacao_cidade'] = $e->getMessage();
      $validado_ok = false;
    }
  endif;
  //===================================================================\\
  if (isset($_POST['telefone'])):
    try {
      $telefone = Valida::telefone($_POST['telefone']);
    } catch (Exception $e) {
      $_SESSION['erro_validacao_telefone'] = $e->getMessage();
      $validado_ok = false;
    }
  endif;

  //===================================================================\\

  if ($validado_ok):
    try {
      $crud->update_usuario_dados_pessoa($_SESSION['usuario']['id'], $sexo, $nome, $estado, $cidade, $telefone);
      $_SESSION['usuario'] =$crud->select_atualizar_perfil($_SESSION['usuario']['id']);
    } catch (Exception $e) {   }
  endif;
  header("Location: ".DOMINIO."perfil");
