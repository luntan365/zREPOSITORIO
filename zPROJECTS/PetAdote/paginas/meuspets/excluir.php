<?php if (!isset($_SESSION['usuario']['id'])) { header("Location: ".DOMINIO); }

try {

  $idpet = $urlamigavel->getVar(0);
  $srcfoto = $crud->select_pet_foto($idpet)['foto'];
  if ($crud->delete_animal($idpet, $_SESSION['usuario']['id'])) {
    unlink(str_replace('\\', '/', DIR_RAIZ).'/'.$srcfoto);
  }

} catch (Exception $e) {}

header("Location: ".DOMINIO."meuspets");
