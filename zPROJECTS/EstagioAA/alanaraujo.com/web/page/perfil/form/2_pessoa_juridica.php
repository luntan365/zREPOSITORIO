
<div class="caixa" id="fieldset_pessoa_juridica">
<span class="caixa-rotulo-pessoajuridica">Pessoa Jurídica</span>

  <div class="caixa-item-form">
    <label>CNPJ</label>
    <input type="text" name="cnpj" id="cnpj" class="campo" maxlength="20"
    value="<?php SESSION::valor('cadastro_superentidade','pessoa','cnpj'); ?>" >
  </div>

  <div class="caixa-item-form">
    <label>Razão Social</label>
    <input type="text" name="razao_social" class="campo" maxlength="200" value="<?php SESSION::valor('cadastro_superentidade','pessoa','razao_social'); ?>" >
  </div>

  <div class="caixa-item-form">
    <label>Fístel</label>
    <input type="text" name="fistel" class="campo" maxlength="20"
    value="<?php SESSION::valor('cadastro_superentidade','pessoa','fistel'); ?>" >
  </div>

  <div class="caixa-item-form">
    <label>Número da Entidade</label>
    <input type="text" name="numero_entidade" class="campo" maxlength="20"
    value="<?php SESSION::valor('cadastro_superentidade','pessoa','numero_entidade'); ?>" >
  </div>

  <div class="caixa-item-form">
    <label>Inscrição Estadual</label>
    <input type="text" name="inscricao_estadual" class="campo" maxlength="20"
    value="<?php SESSION::valor('cadastro_superentidade','pessoa','inscricao_estadual'); ?>" >
  </div>

  <div class="caixa-item-form">
    <label>Inscrição Municipal</label>
    <input type="text" name="inscricao_municipal" class="campo" maxlength="20"
    value="<?php SESSION::valor('cadastro_superentidade','pessoa','inscricao_municipal'); ?>" >
  </div>

</div>

<!-- JAVASCRIPTS -->
<script src="web/js/validadores/cnpj.js" charset="utf-8"></script>
