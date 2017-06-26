<?php
if (!isset($_SESSION['usuario']['id'])) { header("Location: ".DOMINIO."login");}

$idpet = $urlamigavel->getVar(0);
$iddono = $crud->select_pet_id_dono($idpet);

if ($iddono['usuario_id'] == $_SESSION['usuario']['id']) {
  $_SESSION['adocao_erro'] = "Você não pode adotar seu proprio pet.";
}else{
  $pet = $crud->insert_adocao($idpet, $_SESSION['usuario']['id']);

}

header("Location: ".DOMINIO."pet/".$idpet);
