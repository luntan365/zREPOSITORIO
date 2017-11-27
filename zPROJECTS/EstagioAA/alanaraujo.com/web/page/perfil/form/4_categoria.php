<div class="caixa">
<span class="caixa-rotulo-categoria">Categorias</span>

  <?php foreach (CRUD::select('categoria') as $value): ?>
    <div class="caixa-item-form">

      <input type="checkbox" name="<?php echo 'categoria_id_'.$value['id']; ?>" id="<?php echo 'categoria_id_'.$value['id']; ?>" value="<?php echo $value['id']; ?>"
      <?php SESSION::existe_inarray_entao('cadastro_superentidade', 'categoria', $value['id'], 'checked'); ?> >
      <label for="<?php echo 'categoria_id_'.$value['id']; ?>"> <?php echo $value['descricao']; ?> </label>

    </div>
  <?php endforeach; ?>

</div>
