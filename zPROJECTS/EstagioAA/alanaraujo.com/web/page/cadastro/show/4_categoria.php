<?php $sp = SESSION::ss('cadastro_superentidade'); ?>

<?php if ($sp && !empty($sp->categoria())):?>



  <?php
    $categorias = [];
    foreach (CRUD::select('categoria') as  $value):
      $categorias[$value['id']] = $value['descricao'];
    endforeach;
  ?>

  <div class="caixa-show rotulo-categoria">
    <span>Categorias</span>

    <?php foreach ($sp->categoria() as $key => $value): ?>
      <div class="caixa-item-show">
        <p><?php echo $categorias[$key]; ?></p>
      </div>
    <?php endforeach; ?>

  </div>


<?php endif; ?>
