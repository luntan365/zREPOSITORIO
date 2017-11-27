
<div class="caixa" id="fieldset_pessoa_fisica">
<span class="caixa-rotulo-pessoafisica">Pessoa Física</span>

  <div class="caixa-item-form">
    <label>CPF</label>
    <input type="text" name="cpf" id="cpf" class="campo" maxlength="20"
    value="<?php SESSION::valor('cadastro_superentidade','pessoa','cpf'); ?>" >
  </div>

  <div class="caixa-item-form">
    <label>RG</label>
    <input type="text" name="rg" class="campo" maxlength="20"
    value="<?php SESSION::valor('cadastro_superentidade','pessoa','rg'); ?>" >
  </div>

  <div class="caixa-item-form">
    <label>Data de Nascimento</label>
    <input type="text" name="data_nascimento" id="data_nascimento" class="campo" maxlength="20"
    value="<?php echo  Data::data_br(SESSION::valor_return('cadastro_superentidade','pessoa','data_nascimento')); ?>">
  </div>

</div>

<script src="web/js/validadores/cpf.js" charset="utf-8"></script>
<script src="web/js/validadores/data_nascimento.js" charset="utf-8"></script>
