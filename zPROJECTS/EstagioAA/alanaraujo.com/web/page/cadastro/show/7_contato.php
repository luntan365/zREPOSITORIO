<?php $sp = SESSION::ss('cadastro_superentidade'); ?>

<?php if ($sp && !empty($sp->contato())): ?>


  <div class="caixa-show rotulo-contato">
    <span>Contato</span>

    <?php foreach ($sp->contato() as $key => $value): ?>
      <div class="caixa-show">

        <?php if ($value->categoria_contato_id()): ?>
          <div class="caixa-item-show">
            <p><span>Categoria do Contato:</span> <?php echo CRUD::select('categoria_contato','descricao','id = ?', $value->categoria_contato_id())[0]['descricao']; ?></p>
          </div>
        <?php endif; ?>

        <?php if ($value->contato()): ?>
          <div class="caixa-item-show">
            <p><span>Contato:</span> <?php echo $value->contato(); ?></p>
          </div>
        <?php endif; ?>

        <?php if ($value->observacoes()): ?>
          <div class="caixa-item-show">
            <p><span>Observações:</span> <?php echo $value->observacoes(); ?></p>
          </div>
        <?php endif; ?>

        <div class="botao-float">
          <a class="botao-entidade" href="__cadastro/remover_contato/<?php echo $key; ?>">Remover</a>
          <a class="botao-neutro" href="__cadastro/editar_contato/<?php echo $key; ?>">Editar</a>
        </div>


      </div>
    <?php endforeach; ?>

  </div>

<?php endif; ?>
