<?php $sp = SESSION::ss('cadastro_superentidade'); ?>


<?php if ($sp): ?>

  <div class="caixa-show rotulo-entidade">
    <span>Entidade</span>


    <?php if ($sp->entidade()->pessoa() == 'fisica'): ?>
      <div class="caixa-item-show">
        <p><span class="">Tipo:</span> Pessoa Física</p>
      </div>
      <?php elseif($sp->entidade()->pessoa() == 'juridica'): ?>
      <div class="caixa-item-show">
        <p><span>Tipo:</span> Pessoa Jurídica</p>
      </div>
      <?php endif; ?>


    <?php if ($sp->entidade()->nome()): ?>
      <div class="caixa-item-show">
          <p><span>Nome:</span> <?php echo $sp->entidade()->nome(); ?></p>
      </div>
    <?php endif; ?>


    <?php if ($sp->entidade()->observacoes()): ?>
      <div class="caixa-item-show">
        <p><span>Observações:</span> <?php echo $sp->entidade()->observacoes(); ?></p>
      </div>
    <?php endif; ?>

  </div>

<?php endif; ?>
