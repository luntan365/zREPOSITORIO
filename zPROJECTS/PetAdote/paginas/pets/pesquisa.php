<?php
if (!isset($_SESSION['qnt_pes_pet'])) { $_SESSION['qnt_pes_pet'] = 1; }

if ($_SERVER['REQUEST_METHOD']=='POST') { $_SESSION['qnt_pes_pet'] = 1; }
$qnt = 24;
$ini = ($_SESSION['qnt_pes_pet']-1)*$qnt;


if (isset($_SESSION['usuario']['id'])):

  if ($_SERVER['REQUEST_METHOD']=='POST') {

    $_SESSION['pes_pet_especie'] = $_POST['especie'];
    $_SESSION['pes_pet_estado'] = $_POST['estado'];
    $_SESSION['pes_pet_cidade'] = $_POST['cidade'];

    $_SESSION['pesquisa_pet'] = $crud->select_animal_pesquisa_logado_limit( $_SESSION['usuario']['id'], $_SESSION['pes_pet_especie'], $_SESSION['pes_pet_estado'], $_SESSION['pes_pet_cidade'], $ini, $qnt);

  }else{

    $_SESSION['pesquisa_pet'] = $crud->select_animal_pesquisa_logado_limit( $_SESSION['usuario']['id'], $_SESSION['pes_pet_especie'], $_SESSION['pes_pet_estado'], $_SESSION['pes_pet_cidade'], $ini, $qnt);

  }

else:

  if ($_SERVER['REQUEST_METHOD']=='POST') {

    $_SESSION['pes_pet_especie'] = $_POST['especie'];
    $_SESSION['pes_pet_estado'] = $_POST['estado'];
    $_SESSION['pes_pet_cidade'] = $_POST['cidade'];

    $_SESSION['pesquisa_pet'] = $crud->select_animal_pesquisa_limit( $_POST['especie'], $_POST['estado'], $_POST['cidade'], $ini, $qnt);

  }else{

    $_SESSION['pesquisa_pet'] = $crud->select_animal_pesquisa_limit($_SESSION['pes_pet_especie'], $_SESSION['pes_pet_estado'], $_SESSION['pes_pet_cidade'], $ini, $qnt);

  }

endif;

header("Location: ".DOMINIO."pets");
