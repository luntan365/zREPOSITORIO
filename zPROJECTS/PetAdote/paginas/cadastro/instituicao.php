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

?>
<link rel="stylesheet" href="css/cadastro-instituicao.css">
<div class="cadastro-instituicao">

    <form action="cadastro/validar_instituicao" method="post" enctype="multipart/form-data">

      <div class="">
          <label for="cnpj">CNPJ</label>
          <input type="text" name="cnpj" required="" value="<?php get_valor('salvo_valida_cnpj'); ?>">
          <?php get_erro('erro_validacao_cnpj'); ?>
      </div>

      <div class="">
          <label for="endereco">Endereço</label>
          <input type="text" name="endereco" required="" value="<?php get_valor('salvo_valida_endereco'); ?>">
          <?php get_erro('erro_validacao_endereco'); ?>
      </div>

      <?php require_once('resto_formulario.php'); ?>
