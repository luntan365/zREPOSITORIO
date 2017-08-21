<?php permissao_logado();
if ($_SERVER['REQUEST_METHOD']=='POST'):

  $endereco['rua'] = trim($_POST['rua']);
  $endereco['bairro'] = trim($_POST['bairro']);
  $endereco['categoria'] = trim($_POST['categoria']);
  $referencia = trim($_POST['referencia']);
  if (!empty($referencia)) {  $endereco['referencia'] = $referencia; }
  else { $endereco['referencia'] = "";  }

  $imovel['numero'] = trim($_POST['numero']);
  $imovel['valor'] = trim($_POST['valor']);

  $quarto = trim($_POST['quarto']);
  $suite = trim($_POST['suite']);
  $banheiro = trim($_POST['banheiro']);
  $garagem = trim($_POST['garagem']);
  $descricao = trim($_POST['descricao']);

  if (!empty($quarto)) {  $imovel['quarto'] = $quarto; }
  else { $imovel['quarto'] = "0";  }
  if (!empty($suite)) {  $imovel['suite'] = $suite; }
  else { $imovel['suite'] = "0";  }
  if (!empty($banheiro)) {  $imovel['banheiro'] = $banheiro; }
  else { $imovel['banheiro'] = "0";  }
  if (!empty($garagem)) {  $imovel['garagem'] = $garagem; }
  else { $imovel['garagem'] = "0";  }
  if (!empty($descricao)) {  $imovel['descricao'] = $descricao; }
  else { $imovel['descricao'] = "";  }

  if (isset($_POST['quintal'])) {  $imovel['quintal'] = "1"; }
  else { $imovel['quintal'] = "0";  }
  if (isset($_POST['varanda'])) {  $imovel['varanda'] = "1"; }
  else { $imovel['varanda'] = "0";  }

  if (isset($_POST['status'])) { $imovel['status'] = 'disponivel'; } 
  else { $imovel['status'] = 'indisponivel'; }

  $id = $url->vars()[0];
  $endereco_id = $url->vars()[1];
  CRUD::update('imovel', $imovel, 'id = ?', [$id]);
  CRUD::update('endereco', $endereco, 'id = ?', [$endereco_id]);

endif;
