<?php permissao_logado();
if ($_SERVER['REQUEST_METHOD']=='POST'):
    
  $_SESSION['cadastro']['rua'] = trim($_POST['rua']);
  $_SESSION['cadastro']['bairro'] = trim($_POST['bairro']);
  $_SESSION['cadastro']['categoria'] = trim($_POST['categoria']);
  $referencia = trim($_POST['referencia']);
  if (!empty($referencia)) {  $_SESSION['cadastro']['referencia'] = $referencia; }

  $adicionado = [];

  $adicionado['numero'] = trim($_POST['numero']);
  $adicionado['valor'] = trim($_POST['valor']);

  $quarto = trim($_POST['quarto']);
  $suite = trim($_POST['suite']);
  $banheiro = trim($_POST['banheiro']);
  $garagem = trim($_POST['garagem']);
  $descricao = trim($_POST['descricao']);

  if (!empty($quarto)) {  $adicionado['quarto'] = $quarto; }
  if (!empty($suite)) {  $adicionado['suite'] = $suite; }
  if (!empty($banheiro)) {  $adicionado['banheiro'] = $banheiro; }
  if (!empty($garagem)) {  $adicionado['garagem'] = $garagem; }
  if (!empty($descricao)) {  $adicionado['descricao'] = $descricao; }

  if (isset($_POST['quintal'])) {  $adicionado['quintal'] = "1"; }
  if (isset($_POST['varanda'])) {  $adicionado['varanda'] = "1"; }

  if (isset($_POST['status'])) {  
    $adicionado['status'] = 'disponivel'; 
  } else {
    $adicionado['status'] = 'indisponivel'; 
  }

  $_SESSION['cadastro']['adicionados'][] = $adicionado;

endif;
