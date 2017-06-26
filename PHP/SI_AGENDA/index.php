<?php
error_reporting(E_ALL ^ E_NOTICE);
$operacao = $_GET["operacao"];
  switch ($operacao) {
    case 'consultar':  $conteudo = 'php/consultar.php';  $titlulo='Consultar';   break;
    case 'adicionar':  $conteudo = 'php/adicionar.php';  $titlulo='Adicionar';   break;
    case 'editar':  $conteudo = 'php/editar.php';  $titlulo='Editar';   break;
    case 'excluir':  $conteudo = 'php/excluir.php';  $titlulo='Excluir';   break;
    case 'cadastrar':  $conteudo = 'php/cadastrar.php';  $titlulo='Cadastrar';   break;
    default:  $conteudo = 'php/home.php';  $titlulo='Home';   break;
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="js/script.js"></script>
    <title>Agenda - <?php echo $titlulo ?></title>
  </head>
  <body>

    <section id="conteudo">
      <nav>
        <ul>
          <li><a class="config" href="index.php">Home</a></li>
          <li><a class="config" href="?operacao=consultar">Consultar</a></li>
          <li><a class="config" href="?operacao=adicionar">Adicionar</a></li>
          <li><a class="config" href="?operacao=editar">Editar</a></li>
          <li><a class="config" href="?operacao=excluir">Excluir</a></li>
        </ul>
      </nav>

      <section id="principal">
        <?php
          include($conteudo);
        ?>
      </section>

    </section>



  </body>
</html>
