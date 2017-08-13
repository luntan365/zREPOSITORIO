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
            <li><a href="login">Login</a></li>
            <li><a href="cadastrar">Cadastrar Imóvel</a></li>
            <li><a href="alterar">Alterar Imóvel</a></li>
            <li><a href="excluir">Excluir Imóvel</a></li>           
         </ul>
       </div>
     </nav>     
    </div>

    <div class="row grey darken-4" id="corpopesquisa">
           
      <!-- CORPO SITE -->
      <div class="col s9 white" id="corpo">
        <?php include_once($url->pagina()); ?>
      </div>
      
      <!-- MENU LATERAL DIREITA PESQUISA -->
      <div class="col s3">
        
        <form class="container" action="" method="post" autocomplete="off" enctype="multipart/form-data">
          <p>
            <button class="btn waves-effect waves-light" type="submit" name="pesquisar"> Pesquisar </button>   
          </p>
          <p>
            <input type="checkbox" name="casa" class="filled-in" id="casa"/>
            <label for="casa" class="white-text">Casa</label>
          </p>
          <p>
            <input type="checkbox" name="apartamento" class="filled-in" id="apartamento"/>
            <label for="apartamento" class="white-text">Apartamento</label>
          </p>
          <p>
            <input type="checkbox" name="pontocormercial" class="filled-in" id="pontocormercial"/>
            <label for="pontocormercial" class="white-text">Ponto Comercial</label>
          </p>
          <div class="input-field">
            <input type="number" id="quarto" name="quarto" class="white-text">
            <label for="quarto" class="white-text">Quantidade de Quartos + Suites</label>
          </div>
          <div class="input-field">
            <input type="number" id="suite" name="suite" class="white-text">
            <label for="suite" class="white-text">Quantidade de Suites</label>
          </div>
          <div class="input-field">
            <input type="number" id="banheiro" name="banheiro" class="white-text">
            <label for="banheiro" class="white-text">Quantidade de Banheiros Sociais</label>
          </div>          
          <div class="input-field">
            <input type="number" id="suite" name="suite" class="white-text">
            <label for="suite" class="white-text">Quant. de Carros da Garagem</label>
          </div>                       
          <p>
            <input type="checkbox" name="quintal" class="filled-in" id="quintal"/>
            <label for="quintal" class="white-text">Quintal</label>
          </p>
          <p>
            <input type="checkbox" name="varanda" class="filled-in" id="varanda"/>
            <label for="varanda" class="white-text">Varanda</label>
          </p> 
        </form>   

      </div>


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
