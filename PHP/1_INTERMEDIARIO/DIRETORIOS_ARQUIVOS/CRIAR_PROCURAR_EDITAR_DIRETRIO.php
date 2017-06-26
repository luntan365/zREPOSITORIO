<?php
//VASCULHAR DIRETORIO
private function conteudo_diretorio($diretorio){
  if (file_exists($diretorio)) {
    $ponteiro = opendir($diretorio);
    while ($item = readdir($ponteiro)) {
      if ($item != '.' && $item != '..') {
          $itens[] = $item;
      }
    }
    closedir($ponteiro);
    return $itens;
  }
}

// CRIAR DIRETORIO
if ( isset($_POST['criar_diretorio'])) {
  $nomeDiretorio = $_POST['nome_diretorio'];
  $diretorio = "diretorio/$nomeDiretorio";
  if (is_dir($diretorio)) {
    echo "Diretorio $diretorio já existe.";
    echo "<br>";
  } else {
    mkdir($diretorio, 0777);
    echo "Diretório $diretorio criado com sucesso.";
    echo "<br>";
  }
}

// EXCLUIR DIRETORIO
function deletarAquivoOuPasta($dir) {
  if (is_dir("$dir")) {
    $files = array_diff(scandir($dir), array('.','..'));
    foreach ($files as $file) {
      (is_dir("$dir/$file")) ? deletarAquivoOuPasta("$dir/$file") : unlink("$dir/$file");
    }
    return rmdir($dir);
  } else {
    return unlink("$dir");
  }
}

if ( isset($_GET['removedir'])) {
  $diretorio = "diretorio/".$_GET['removedir'];
  deletarAquivoOuPasta("$diretorio");
  header("Location: CRIAR_PASTA.php");
}

// RENOMEAR DIRETORIO
if ( isset($_POST['rename'])) {
  $nome = "diretorio/" . $_POST['nome'];
  $nomenovo = "diretorio/" . $_POST['novo_nome'];
  if (is_dir($nomenovo)) {
    echo "Diretorio $nomenovo já existe, escolha outro nome.";
  } else {
    if (rename($nome, $nomenovo)) {
      echo "O diretorio $nome foi renomeado para $nomenovo.";
      echo "<br>";
      } else {
      echo "Não doi possivel renomear o diretorio $nome para $nomenovo.";
      echo "<br>";
    }
  }
}


?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form class="" action="" method="post">
      <label for="nome_diretorio">Nova Pasta</label>
      <input type="text" name="nome_diretorio" value="">
      <button type="submit" name="criar_diretorio">Criar</button>
    </form>

    <div class="">
      <ul>
        <?php
          $ponteiro = opendir("diretorio/");
          while ($item = readdir($ponteiro)) { $itens[] = $item;  }
          sort($itens);
          foreach ($itens as $listar) {
            if ($listar != '.' && $listar != '..') {
              $pastas[] = $listar;
            }
          }
          if (isset($pastas)) {
            foreach ($pastas as $dir) {
              echo "<li>$dir - <a href=\"?removedir=$dir\">(X)excluir</a> -
              <form action=\"\" method=\"post\">
                <input type=\"hidden\" name=\"nome\" value=\"$dir\">
                <input type=\"text\" name=\"novo_nome\">
                <button type=\"submit\" name=\"rename\">Renomear</button>
              </form>
              </li>";
            }
          }

        ?>
      </ul>
    </div>


  </body>
</html>
