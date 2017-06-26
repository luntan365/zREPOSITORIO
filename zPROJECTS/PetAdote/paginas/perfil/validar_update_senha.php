<?php
if (!isset($_SESSION['usuario']['id'])) { header("Location: ".DOMINIO); }
if (!$_SERVER['REQUEST_METHOD']=='POST') {  header("Location: ".DOMINIO); }

  $validado_ok = true;

  //===================================================================\\
  if (isset($_POST['senha'])):
    if ($_SESSION['usuario']['senha'] != md5($_POST['senha'])){
      $_SESSION['erro_validacao_senha'] = "Sua senha está incorreta.";
      $validado_ok = false;
    }
  endif;

//===================================================================\\
if (isset($_POST['novasenha'])):
  try {
    $novasenha = Valida::texto($_POST['novasenha'], 32, 4);
    if ($_SESSION['usuario']['senha'] == md5($novasenha)){
      $_SESSION['erro_validacao_novasenha'] = 'Use uma senha diferente da atual';
      $validado_ok = false;
    }
  } catch (Exception $e) {
    $_SESSION['erro_validacao_novasenha'] = $e->getMessage();
    $validado_ok = false;
  }
endif;

//===================================================================\\
if (isset($_POST['novasenhaconfirme'])):
  if (isset($novasenha)) {
    if ($novasenha != $_POST['novasenhaconfirme']){
      $_SESSION['erro_validacao_novasenhaconfirme'] = "As senhas estão diferente.";
      $validado_ok = false;
    }
  }
endif;

//===================================================================\\
if ($validado_ok) {
  try {
    $crud->update_usuario_senha($_SESSION['usuario']['id'], $novasenha);
  } catch (Exception $e) { }
}
  header("Location: ".DOMINIO."perfil");
