<?php $sp = SESSION::ss('cadastro_superentidade'); ?>

<?php if ($sp && $sp->pessoa() && $sp->entidade()->pessoa() == 'fisica'): ?>

  <div class="caixa-show rotulo-pessoafisica">
    <span>Pessoa Física</span>



    <?php if ($sp->pessoa()->cpf()): ?>
      <div class="caixa-item-show">
        <p><span>CPF:</span> <?php echo $sp->pessoa()->cpf(); ?></p>
      </div>
    <?php endif; ?>


    <?php if ($sp->pessoa()->rg()): ?>
      <div class="caixa-item-show">
        <p><span>RG:</span> <?php echo $sp->pessoa()->rg(); ?></p>
      </div>
    <?php endif; ?>


    <?php if ($sp->pessoa()->data_nascimento()): ?>
      <div class="caixa-item-show">
        <p><span>Data Nascimento:</span> <?php echo Data::data_br($sp->pessoa()->data_nascimento()); ?></p>
      </div>
    <?php endif; ?>

  </div>

<?php endif; ?>
