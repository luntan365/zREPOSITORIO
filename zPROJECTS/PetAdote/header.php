<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>PetAdote</title>
        <base href="<?php echo DOMINIO; ?>">
        <meta name="viewport" content="width=device-width">
        <style> @import url("style/style.css"); </style>
    </head>
    <body>
<html>
        <header id="header">
            <div class="class-header">
                <img id="imagensPetAdote" src="img/logo-petadote.png" alt="Logo do PetAdote">

  <?php  if(isset($_SESSION['usuario']['id'])):  ?>
                <div class="class-header-acesso">
                  <span>Seja bem vindo <?php echo $_SESSION['usuario']['nome'] ?></span>
                  <a href="login/deslogar"><button id="entrar">SAIR</button></a>
                </div>
  <?php else: ?>
                <div class="class-header-acesso">
                    <a href="login" id="langa"><button id="entrar">ENTRAR</button></a>
                    <a href="cadastro" id="cadastra"><button id="cadastreSe">CADASTRE-SE</button></a>
                </div>
  <?php endif; ?>


            </div>
            <div class="class-nav">
                <nav>
                    <ul>
                        <li><a href="<?php echo DOMINIO; ?>" id="home"><img src="img/icone/icom-home.png" alt="icome home" /></a></li>
                        <li><a href="pets" id="pets">PETS</a></li>

                        <?php if (isset($_SESSION['usuario']['id'])): ?>
                          <li><a href="meuspets">MEUS PETS</a></li>
                          <li><a href="adocoes">ADOÇÕES</a></li>
                          <li><a href="doacoes">DOAÇÕES</a></li>
                          <li><a href="perfil">PERFIL</a></li>
                        <?php endif; ?>

                        <li><a href="quemsomos" id="quemsomos">QUEM SOMOS</a></li>
                        <li><a href="contatos" id="contato">CONTATOS</a></li>



                    </ul>
                </nav>
                <div class="class-nav-social">
                    <a href=""><img id="facebook" src="img/icone/icom-facebook.png" alt="link pagina facebook PetAdote"/></a>
                    <a href=""><img id="instagram" src="img/icone/icom-instagram.png" alt="link pagina instagram PetAdote"/></a>
                    <a href=""><img id="g+" src="img/icone/icom-gmais.png" alt="link pagina G+ PetAdote"/></a>
                </div>
            </div>
        </header>
        <div id="altura-menu-fixo"></div>

<div id="div1">
