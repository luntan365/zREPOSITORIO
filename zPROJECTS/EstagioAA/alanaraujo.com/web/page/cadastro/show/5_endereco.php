<?php $sp = SESSION::ss('cadastro_superentidade'); ?>

<?php if ($sp && !empty($sp->endereco())): ?>


  <div class="caixa-show rotulo-endereco">
    <span>Endereço</span>

    <?php foreach ($sp->endereco() as $key => $value): ?>
      <div class="caixa-show">


        <?php if ($value->rua()): ?>
          <div class="caixa-item-show">
            <p><span>Rua:</span> <?php echo $value->rua(); ?></p>
          </div>
        <?php endif; ?>

        <?php if ($value->numero()): ?>
          <div class="caixa-item-show">
            <p><span>Número:</span> <?php echo $value->numero(); ?></p>
          </div>
        <?php endif; ?>

        <?php if ($value->bairro()): ?>
          <div class="caixa-item-show">
            <p><span>Bairro:</span> <?php echo $value->bairro(); ?></p>
          </div>
        <?php endif; ?>

        <?php if ($value->cep()): ?>
          <div class="caixa-item-show">
            <p><span>CEP:</span> <?php echo $value->cep(); ?></p>
          </div>
        <?php endif; ?>

        <?php if ($value->complemento()): ?>
          <div class="caixa-item-show">
            <p><span>Complemento:</span> <?php echo $value->complemento(); ?></p>
          </div>
        <?php endif; ?>

        <?php if ($value->observacoes()): ?>
          <div class="caixa-item-show">
            <p><span>Observações:</span> <?php echo $value->observacoes(); ?></p>
          </div>
        <?php endif; ?>

        <?php
        if ($value->cidade_id()):
          $pec = CRUD::select('cidade c, estado e, pais p','c.descricao as cidade, e.descricao as estado, p.descricao as pais', 'c.id = ? && c.estado_id = e.id && e.pais_id = p.id', $value->cidade_id());
          $pec = $pec[0];
        ?>
        <div class="caixa-item-show">
          <p><span>País:</span> <?php echo $pec['pais']; ?></p>
        </div>

        <div class="caixa-item-show">
          <p><span>Estado:</span> <?php echo $pec['estado']; ?></p>
        </div>

        <div class="caixa-item-show">
          <p><span>Cidade:</span> <?php echo $pec['cidade']; ?></p>
        </div>

        <?php endif; ?>

        <div class="botao-float">
          <a class="botao-entidade" href="__cadastro/remover_endereco/<?php echo $key; ?>">Remover</a>
          <a class="botao-neutro" href="__cadastro/editar_endereco/<?php echo $key; ?>">Editar</a>          
        </div>


      </div>
    <?php endforeach; ?>

  </div>

<?php endif; ?>
