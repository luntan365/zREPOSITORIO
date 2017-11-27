<form class="" action="__cadastro/validar_endereco" autocomplete="off" method="post" enctype="multipart/form-data">

  <div class="caixa">
  <span class="caixa-rotulo-endereco">Endereço</span>

    <div class="caixa-item-form">
      <label>Rua</label>
      <input type="text" name="rua" class="campo"  maxlength="100"
        value="<?php SESSION::valor2('cadastro_endereco','rua'); ?>" >
    </div>

    <div class="caixa-item-form">
      <label>Número</label>
      <input type="text" name="numero" class="campo" maxlength="10"
        value="<?php SESSION::valor2('cadastro_endereco','numero'); ?>" >
    </div>

    <div class="caixa-item-form">
      <label>Bairro</label>
      <input type="text" name="bairro" class="campo" maxlength="100"
      value="<?php SESSION::valor2('cadastro_endereco','bairro'); ?>" >
    </div>

    <div class="caixa-item-form">
      <label>CEP</label>
      <input type="text" name="cep" class="campo" maxlength="20"
      value="<?php SESSION::valor2('cadastro_endereco','cep'); ?>" >
    </div>

    <div class="caixa-item-form">
      <label>Complemento</label>
      <input type="text" name="complemento" class="campo" maxlength="500"
      value="<?php SESSION::valor2('cadastro_endereco','complemento'); ?>" >
    </div>

    <div class="caixa-item-form">
      <label>Observações</label>
      <input type="text" name="observacoes" class="campo" maxlength="500"
      value="<?php SESSION::valor2('cadastro_endereco','observacoes'); ?>" >
    </div>

    <div class="caixa-item-form">
      <label for="pais">País</label>
      <?php $pais = !empty($_SESSION['cadastro_endereco_pais']) ? $_SESSION['cadastro_endereco_pais'] : '1'; ?>
      <select id="pais" name="pais" class="campo"  value="<?php echo $pais; ?>"></select>
    </div>

    <div class="caixa-item-form">
      <label for="estado">Estado</label>
      <?php $estado = !empty($_SESSION['cadastro_endereco_estado']) ? $_SESSION['cadastro_endereco_estado'] : '6'; ?>
      <select id="estado" name="estado" class="campo" value="<?php echo $estado; ?>"> </select>
    </div>

    <div class="caixa-item-form">
      <label for="cidade">Cidade</label>
      <select id="cidade" name="cidade" class="campo" value="<?php SESSION::valor2('cadastro_endereco','cidade_id', '1'); ?>"> </select>
    </div>

    <div class="botoes">
      <input type="submit" name="submit" class="botao-endereco" value="Adicionar Endereço">
    </div>

  </div>

</form>

<!--======================JAVA SCRIPTS======================-->
<script src="web/js/jsonajax/popular_pais_estado_cidade.js" charset="utf-8"></script>
