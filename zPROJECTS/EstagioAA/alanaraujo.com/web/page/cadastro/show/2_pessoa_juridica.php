<?php $sp = SESSION::ss('cadastro_superentidade'); ?>

<?php if ($sp && $sp->pessoa() && $sp->entidade()->pessoa() == 'juridica'): ?>

<div class="caixa-show rotulo-pessoajuridica">
  <span>Pessoa Jurídica</span>

  <?php if ($sp->pessoa()->cnpj()): ?>
    <div class="caixa-item-show">
      <p><span>CNPJ:</span> <?php echo $sp->pessoa()->cnpj(); ?></p>
    </div>
  <?php endif; ?>


  <?php if ($sp->pessoa()->razao_social()): ?>
    <div class="caixa-item-show">
      <p><span>Razão Social:</span> <?php echo $sp->pessoa()->razao_social(); ?></p>
    </div>
  <?php endif; ?>


  <?php if ($sp->pessoa()->fistel()): ?>
    <div class="caixa-item-show">
      <p><span>Fístel:</span> <?php echo $sp->pessoa()->fistel(); ?></p>
    </div>
  <?php endif; ?>


  <?php if ($sp->pessoa()->numero_entidade()): ?>
    <div class="caixa-item-show">
      <p><span>Número da Entidade:</span> <?php echo $sp->pessoa()->numero_entidade(); ?></p>
    </div>
  <?php endif; ?>


  <?php if ($sp->pessoa()->inscricao_estadual()): ?>
    <div class="caixa-item-show">
      <p><span>Inscrição Estadual:</span> <?php echo $sp->pessoa()->inscricao_estadual(); ?></p>
    </div>
  <?php endif; ?>


  <?php if ($sp->pessoa()->inscricao_municipal()): ?>
    <div class="caixa-item-show">
      <p><span>Inscrição Municipal:</span> <?php echo $sp->pessoa()->inscricao_municipal(); ?></p>
    </div>
  <?php endif; ?>


</div>

<?php endif; ?>
