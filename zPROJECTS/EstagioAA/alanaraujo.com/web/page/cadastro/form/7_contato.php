<form class="" action="__cadastro/validar_contato" autocomplete="off" method="post" enctype="multipart/form-data">

  <div class="caixa">
  <span class="caixa-rotulo-contato">Contato</span>

    <div class="caixa-item-form">
      <label>Categoria do contato</label>
      <select name="categoria_contato" class="campo">
        <?php foreach (CRUD::select('categoria_contato') as  $value): ?>
            <option value="<?php echo $value['id']; ?>"
            <?php SESSION::igual_entao2('cadastro_contato', 'categoria_contato_id', $value['id'], 'selected'); ?> >
            <?php echo $value['descricao']; ?>
            </option>
        <?php endforeach; ?>
      </select>
    </div>

    <div class="caixa-item-form">
      <label>Contato</label>
      <input type="text" name="contato" class="campo"  maxlength="500"
      value="<?php SESSION::valor2('cadastro_contato','contato'); ?>" >
    </div>

    <div class="caixa-item-form">
      <label>Observações</label>
      <textarea name="observacoes" rows="1" class="campo" maxlength="500"><?php SESSION::valor2('cadastro_contato','observacoes'); ?></textarea>
    </div>

    <div class="botoes">
      <input type="submit" name="submit" class="botao-contato" value="Adicionar Contato">
    </div>

  </div>

</form>
