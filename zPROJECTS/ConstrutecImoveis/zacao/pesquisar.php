<?php 
if ($_SERVER['REQUEST_METHOD']=='POST'):

  $_SESSION['pesquisa'] = [];

  if (isset($_POST['casa'])) {  $_SESSION['pesquisa']['casa'] = 'casa'; }    
  if (isset($_POST['ap'])) {  $_SESSION['pesquisa']['ap'] = 'ap'; } 
  if (isset($_POST['comercial'])) {  $_SESSION['pesquisa']['comercial'] = 'comercial'; }

  if (isset($_POST['quintal'])) {  $_SESSION['pesquisa']['quintal'] = 'quintal'; }
  if (isset($_POST['varanda'])) {  $_SESSION['pesquisa']['varanda'] = 'varanda'; }

  $quarto_suite = trim($_POST['quarto_suite']);
  if (!empty($quarto_suite)) {  $_SESSION['pesquisa']['quarto_suite'] = $quarto_suite; }
  $suite = trim($_POST['suite']);
  if (!empty($suite)) {  $_SESSION['pesquisa']['suite'] = $suite; }
  $banheiro = trim($_POST['banheiro']);
  if (!empty($banheiro)) {  $_SESSION['pesquisa']['banheiro'] = $banheiro; }
  $garagem = trim($_POST['garagem']);
  if (!empty($garagem)) {  $_SESSION['pesquisa']['garagem'] = $garagem; }

  // (categoria = casa OR categoria = ap OR categoria = comercial) AND quarto_suite >= ? AND suite >= ? AND banheiro >= ? AND garagem >= ? AND quintal >= 1 AND varanda >= 1

  $where_values = [];
  $or = [];
  if (isset($_SESSION['pesquisa']['casa'])) {  $or['casa'] = 'casa'; }
  if (isset($_SESSION['pesquisa']['ap'])) {  $or['ap'] = 'ap'; }
  if (isset($_SESSION['pesquisa']['comercial'])) {  $or['comercial'] = 'comercial'; }

  $where_OR = "";
  $count = count($or);
  if ($count>0) {
    if ($count==1) { $where_OR = "AND (categoria = ?)"; }
    if ($count==2) { $where_OR = "AND (categoria = ? OR categoria = ?)"; }
    if ($count==3) { $where_OR = "AND (categoria = ? OR categoria = ? OR categoria = ?)"; }
    $where_values = array_values($or);
  }

  $and = [];
  if (isset($_SESSION['pesquisa']['quintal'])) {  $and['quintal'] = 1; }
  if (isset($_SESSION['pesquisa']['varanda'])) {  $and['varanda'] = 1; }
  if (isset($_SESSION['pesquisa']['quarto_suite'])) {  $and['(quarto + suite)'] = $_SESSION['pesquisa']['quarto_suite']; }
  if (isset($_SESSION['pesquisa']['suite'])) {  $and['suite'] = $_SESSION['pesquisa']['suite']; }
  if (isset($_SESSION['pesquisa']['banheiro'])) {  $and['banheiro'] = $_SESSION['pesquisa']['banheiro']; }
  if (isset($_SESSION['pesquisa']['garagem'])) {  $and['garagem'] = $_SESSION['pesquisa']['garagem']; }

  $where_AND = "";
  if (!empty($and)) {
    $where_AND = implode(' >= ? AND ', array_keys($and));
    $where_AND = 'AND '.$where_AND.' >= ?';
    $valores = array_values($and);
    $where_values =  array_merge($where_values, $valores);  
  }

  $where = $where_OR.' '.$where_AND;

  if (empty($_SESSION['usuario'])){
    $where_values[] = 'disponivel';
    $_SESSION['pesquisa']['where'] = "i.endereco_id = e.id $where AND status = ? ORDER BY i.valor ASC";
    $_SESSION['pesquisa']['dados'] = $where_values;
  } else {
    $_SESSION['pesquisa']['where'] = "i.endereco_id = e.id $where ORDER BY i.valor ASC";
    $_SESSION['pesquisa']['dados'] = $where_values;
  }

endif;
?>
