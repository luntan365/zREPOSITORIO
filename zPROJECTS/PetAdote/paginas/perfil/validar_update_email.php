<?php
if (!isset($_SESSION['usuario']['id'])) { header("Location: ".DOMINIO); }
if (!$_SERVER['REQUEST_METHOD']=='POST') {  header("Location: ".DOMINIO); }

  $validado_ok = true;

  //===================================================================\\
  if (isset($_POST['email'])):
    try {
      $email = Valida::email($_POST['email']);

        if ($email != $_SESSION['usuario']['email']) {
          if (!empty($crud->select_email_existe($email))):
            $_SESSION['erro_validacao_email'] = "E-mail já está sendo usado.";
            $validado_ok = false;
          endif;
        }else{
          $_SESSION['erro_validacao_email'] = "Use um e-mail diferente do atual.";
          $validado_ok = false;
        }

    } catch (Exception $e) {
      $_SESSION['erro_validacao_email'] = $e->getMessage();
      $validado_ok = false;
    }
  endif;
  //===================================================================\\
  if (isset($_POST['emailcomfirma'])):
    try {
      if (isset($email)) {
        if ($_POST['emailcomfirma'] != $email):
          $_SESSION['erro_validacao_emailcomfirma'] = "E-mails estão diferente.";
          $validado_ok = false;
        endif;
      }
    } catch (Exception $e) {
      $_SESSION['erro_validacao_emailcomfirma'] = $e->getMessage();
      $validado_ok = false;
    }
  endif;

//===================================================================\\
if ($validado_ok) {
  try {
    $crud->update_usuario_email($_SESSION['usuario']['id'], $email);
    $_SESSION['usuario'] =$crud->select_atualizar_perfil($_SESSION['usuario']['id']);
  } catch (Exception $e) { }
}
  header("Location: ".DOMINIO."perfil");
