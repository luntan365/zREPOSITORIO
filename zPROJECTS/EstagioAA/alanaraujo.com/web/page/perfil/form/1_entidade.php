<div class="caixa">
  <span class="caixa-rotulo-entidade">Entidade</span>

  <div class="caixa-form">
    <div class="caixa-item-form">
      <input type="radio" name="pessoa" value="juridica" id="pessoa_juridica" required checked >
      <label for="pessoa_juridica">Pessoa Jurídica</label>
    </div>

    <div class="caixa-item-form">
      <input type="radio" name="pessoa" value="fisica" id="pessoa_fisica" <?php SESSION::igual_entao('cadastro_superentidade','entidade','pessoa','fisica','checked'); ?> >
      <label for="pessoa_fisica">Pessoa Física</label>
    </div>
  </div>

  <div class="caixa-item-form">
    <label>Nome *</label>
    <input type="text" name="nome" class="campo" maxlength="100"
    value="<?php SESSION::valor('cadastro_superentidade','entidade','nome'); ?>" >
  </div>

  <div class="caixa-item-form">
    <label>Observações</label>
    <textarea id="textarea" name="observacoes" rows="1" class="campo" maxlength="2000"><?php SESSION::valor('cadastro_superentidade','entidade','observacoes'); ?></textarea>
  </div>

</div>
