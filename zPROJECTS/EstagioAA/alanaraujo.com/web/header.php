<!DOCTYPE html>
<html>
  <head>
      <meta charset="utf-8" />
      <title>Alan Araujo</title>
      <base href="<?php echo DOMINIO; ?>">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="shortcut icon" href="web/img/favicon.ico" type="image/x-icon">
      <link rel="icon" href="web/img/favicon.ico" type="image/x-icon">

      <!-- CSS -->
      <?php if (Util::isMobile()): ?>
        <link rel="stylesheet" href="web/css/mobile-0-index.css" id="css-index">
        <link rel="stylesheet" href="web/css/mobile-1-cadastro.css" id="css-cadastro">
      <?php else: ?>
        <link rel="stylesheet" href="web/css/desktop-0-index.css" id="css-index">
        <link rel="stylesheet" href="web/css/desktop-1-cadastro.css" id="css-cadastro">
      <?php endif; ?>
      <script src="web/js/jsonajax/ajax.js" charset="utf-8"></script>

  </head>
  <!-- impedir arrastar e soltar em imput seu valor -->
  <body ondragstart='return false'>

    <nav id="top">
      <ul>
      <!-- Caixa de Pesquisa -->
      <li>
        <form action="pesquisa" method="post" enctype="multipart/form-data">
          <input type="text" id="pesquisa-top" name="pesquisa" value="" placeholder="Pesquise..." autocomplete="off">
        </form>
      </li>
      <?php require_once DIRETORIO_RAIZ.'/web/menu_entidade.php'; ?>
      </ul>
    </nav>
    <!-- fim top menu -->

    <div id="resultado-pesquisa-top"></div>

    <!-- Botao Menu Mobile -->
    <?php if (Util::isMobile()): ?>
      <div id="botaomenumobile" class="botaomenu">
        <img src="web/img/menu-mobile.png">
      </div>
    <?php endif; ?>

    <?php require_once DIRETORIO_RAIZ.'/web/menu.php'; ?>

    <div id="mid">

     <?php Notificacao::notificacoes(); ?>


      <!-- script para akustar o pading top da div #mid -->
      <script src="web/js/mid_padding_top.js" charset="utf-8"></script>
