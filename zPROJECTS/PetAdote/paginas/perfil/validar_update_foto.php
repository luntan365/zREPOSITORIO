<?php
if (!isset($_SESSION['usuario']['id'])) { header("Location: ".DOMINIO); }
if (!$_SERVER['REQUEST_METHOD']=='POST') {  header("Location: ".DOMINIO); }

  $validado_ok = true;

//===================================================================\\

  try {
    $foto = new UploadImagem('foto','img/usuariosfotos', 200, 200);
  } catch (Exception $e) {
    $_SESSION['erro_validacao_foto'] = $e->getMessage();
    $validado_ok = false;
  }

  //===================================================================\\

  if ($validado_ok) {
    try {
      $crud->update_usuario_foto($_SESSION['usuario']['id'], $foto);
      unlink(str_replace('\\', '/', DIR_RAIZ).'/'.$_SESSION['usuario']['foto']);
      $_SESSION['usuario'] = $crud->select_atualizar_perfil($_SESSION['usuario']['id']);
    } catch (Exception $e) { }
  }
  header("Location: ".DOMINIO."perfil");
