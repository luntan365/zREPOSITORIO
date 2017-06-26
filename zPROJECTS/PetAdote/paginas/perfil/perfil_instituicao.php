
<div class="alterar-instituicao">
    <form action="perfil/validar_instituicao" method="post" enctype="multipart/form-data">

      <div class="">
          <label for="cnpj">CNPJ</label>
          <input type="text" name="cnpj" required="" value="<?php get_valor('cnpj'); ?>">
          <?php get_erro('erro_validacao_cnpj'); ?>
      </div>

      <div class="">
          <label for="endereco">Endereço</label>
          <input type="text" name="endereco" required="" value="<?php get_valor('endereco'); ?>">
          <?php get_erro('erro_validacao_endereco'); ?>
      </div>

      <?php require_once('perfil_resto_formulario.php'); ?>
