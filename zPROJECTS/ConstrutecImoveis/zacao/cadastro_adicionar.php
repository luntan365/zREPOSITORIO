<?php
$_SESSION['cadastro']['rua'] = $_POST['rua'];
$_SESSION['cadastro']['bairro'] = $_POST['bairro'];
$_SESSION['cadastro']['rua'] = $_POST['referencia'];
$_SESSION['cadastro']['tipo'] = $_POST['tipo']; //casa, apartamento, pontocomercial

$adicionado = [];
$adicionado['numero'] = $_POST['numero'];
$adicionado['valor'] = $_POST['valor'];
$adicionado['descricao'] = $_POST['descricao'];
$adicionado['quarto'] = $_POST['quarto'];
$adicionado['suite'] = $_POST['suite'];
$adicionado['banheiro'] = $_POST['banheiro'];
$adicionado['tipo'] = $_POST['tipo'];
$adicionado['garagem'] = $_POST['garagem'];
if (isset($_POST['quintal'])) {  $adicionado['quintal'] = $_POST['quintal']; }
if (isset($_POST['varanda'])) {  $adicionado['varanda'] = $_POST['varanda']; }
$_SESSION['cadastro']['adicionados'][] = $adicionado;
