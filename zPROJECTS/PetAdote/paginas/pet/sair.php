<?php

if (!isset($_SESSION['usuario']['id'])) { header("Location: ".DOMINIO."login");}

$idpet = $urlamigavel->getVar(0);

$pet = $crud->delete_adocao_lista($idpet, $_SESSION['usuario']['id']);

header("Location: ".DOMINIO."pet/".$idpet);
