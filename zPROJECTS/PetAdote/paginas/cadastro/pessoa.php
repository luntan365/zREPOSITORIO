<?php
function get_valor($keysession){
  if (!empty($_SESSION[$keysession])):
    echo $_SESSION[$keysession];
    unset($_SESSION[$keysession]);
  endif;
}
function get_erro($keysession){
  if (!empty($_SESSION[$keysession])):
    echo '<span class="erro">'.$_SESSION[$keysession].'</span>';
    unset($_SESSION[$keysession]);
  endif;
}

function input_checked($namesession, $valosession){
  if (!empty($_SESSION[$namesession]) && $_SESSION[$namesession]==$valosession):
    echo 'checked';
    unset($_SESSION[$namesession]);
  endif;
}
?>
<link rel="stylesheet" href="css/cadastro-pessoa.css">

<div class="cadastro-pessoa">
    <h1>Cadastro</h1>
    <form action="cadastro/validar_pessoa" method="post" enctype="multipart/form-data">

      <div id="caixa-sexo" class="cadastro-inline">
        <label for="sexo">Sexo</label>
        <input type="radio" name="sexo" id="sexom" value="masculino"  required="" <?php input_checked('salvo_valida_sexo', 'masculino'); ?> ><label for="sexom">Masculino</label>
        <input type="radio" name="sexo" id="sexof" value="feminino" <?php input_checked('salvo_valida_sexo', 'feminino'); ?>><label for="sexof">Feminino</label>
        <?php get_erro('erro_validacao_sexo'); ?>
      </div>
      <br>
      <?php require_once('resto_formulario.php'); ?>
