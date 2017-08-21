<?php require_once 'config.php' ?>
<!DOCTYPE html>
<html>  
  <head>
    <meta charset="utf-8">
    <title>Construtec Imóveis</title>
    <base href="<?php echo DOMINIO; ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">
    <!-- CSS -->
    <link rel="stylesheet" href="css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="css/style.css">
    <style media="screen">
      #corpo { min-height: 82vh; }
      #corpopesquisa  { margin-bottom: 0px; }
      .input-field { margin-top: 0px; }
    </style>
  </head>
  <body ondragstart='return false'>

    <!-- CABECALHO -->
    <div class="col s12 grey darken-4">      
      <nav class="grey darken-4">
       <div class="nav-wrapper">
         <ul class="left">
           
            <li><a href="">Inicio</a></li>            
            <?php if (empty($_SESSION['usuario'])): ?>
              <li><a href="acesso">Login</a></li>
            <?php else: ?>
              <li><a href="cadastro">Cadastro</a></li>
              <li><a href="acesso_deslogar">Sair</a></li>
            <?php endif; ?>            
                      
         </ul>
       </div>
     </nav>     
    </div>

    <div class="row grey darken-4" id="corpopesquisa">
           
      <!-- CORPO SITE -->
      <div class="col s9 white" id="corpo">
        <br>
        <?php Notificacao::notificacoes(); ?>
        <?php require_once($url->pagina()); ?>
      </div>
      
      <?php require_once(DIRETORIO_RAIZ.'/menu.php') ?>


      <!-- FOOTER -->
      <div class="col s12">
        <p class="white-text center-align">Copyright © 2017 Construtec - Todos os direitos reservados.</p>
      </div>
      
    </div>

    
    <!-- JAVASCRIPT -->
    <script src="js/jquery-3.2.1.min.js" charset="utf-8"></script>
    <script src="js/materialize.min.js" charset="utf-8"></script>
    
  </body>
</html>
