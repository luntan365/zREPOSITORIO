<?php
if (!isset($_SESSION['usuario']['id'])) { header("Location: ".DOMINIO); }
if (!$_SERVER['REQUEST_METHOD']=='POST') {  header("Location: ".DOMINIO); }

  $validado_ok = true;

  //===================================================================\\
  if (isset($_POST['cnpj'])):
    try {
      $cnpj = Valida::cnpj($_POST['cnpj']);
    } catch (Exception $e) {
      $_SESSION['erro_validacao_cnpj'] = $e->getMessage();
      $validado_ok = false;
    }
  endif;
  //===================================================================\\
  if (isset($_POST['endereco'])):
    try {
      $endereco = Valida::texto($_POST['endereco'], 255);
    } catch (Exception $e) {
      $_SESSION['erro_validacao_endereco'] = $e->getMessage();
      $validado_ok = false;
    }
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
      $crud->update_usuario_dados_instituicao($_SESSION['usuario']['id'], $cnpj, $endereco, $nome, $estado, $cidade, $telefone);
      $_SESSION['usuario'] =$crud->select_atualizar_perfil($_SESSION['usuario']['id']);
    } catch (Exception $e) {}

  endif;
  header("Location: ".DOMINIO."perfil");
