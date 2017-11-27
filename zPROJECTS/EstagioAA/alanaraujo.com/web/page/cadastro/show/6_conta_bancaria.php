<?php $sp = SESSION::ss('cadastro_superentidade'); ?>

<?php if ($sp && !empty($sp->conta_bancaria())): ?>

  <div class="caixa-show rotulo-contabancaria">
    <span>Conta Bancária</span>

    <?php foreach ($sp->conta_bancaria() as $key => $value): ?>
      <div class="caixa-show">

        <?php if ($value->banco_id()): ?>
          <div class="caixa-item-show">
            <p><span>Banco:</span> <?php echo CRUD::select('banco','descricao','id = ?', $value->banco_id())[0]['descricao']; ?></p>
          </div>
        <?php endif; ?>

        <?php if ($value->agencia()): ?>
          <div class="caixa-item-show">
            <p><span>Agência:</span> <?php echo $value->agencia(); ?></p>
          </div>
        <?php endif; ?>

        <?php if ($value->numero_conta()): ?>
          <div class="caixa-item-show">
            <p><span>Número da Conta:</span> <?php echo $value->numero_conta(); ?></p>
          </div>
        <?php endif; ?>

        <?php if ($value->operacao()): ?>
          <div class="caixa-item-show">
            <p><span>Operação:</span> <?php echo $value->operacao(); ?></p>
          </div>
        <?php endif; ?>

        <?php if ($value->observacoes()): ?>
          <div class="caixa-item-show">
            <p><span>Observações:</span> <?php echo $value->observacoes(); ?></p>
          </div>
        <?php endif; ?>

      <div class="botao-float">
        <a class="botao-entidade" href="__cadastro/remover_contabancaria/<?php echo $key; ?>">Remover</a>
          <a class="botao-neutro" href="__cadastro/editar_contabancaria/<?php echo $key; ?>">Editar</a>
      </div>

    </div>
  <?php endforeach; ?>
</div>
<?php endif; ?>
