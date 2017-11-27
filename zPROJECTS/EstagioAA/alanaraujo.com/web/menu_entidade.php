<!-- Entidade ativa -->
<?php if (!empty($_SESSION['entidade_ativa']['entidade'])): ?>

  <!-- Botao Menu Mobile -->
  <?php if (Util::isMobile()): ?>
    <div id="botaomenuentidade" class="botaomenu">
      <img src="web/img/menu-retratil.png">
    </div>
    <div id="meam">
  <?php endif; ?>

  <li class="nome"><?php echo $_SESSION['entidade_ativa']['entidade']['nome']; ?></li>

  <a href="">
    <li><img src="web/img/icon/projetos.png"><span>Serviços</span></li>
  </a>

  <a href="">
    <li><img src="web/img/icon/transacoes.png"><span>Transações</span></li>
  </a>

  <a href="">
    <li><img src="web/img/icon/negociacoes.png"><span>Negociações</span></li>
  </a>

  <a href="">
    <li><img src="web/img/icon/cadastro.png"><span>Registros</span></li>
  </a>

  <a href="perfil">
    <li><img src="web/img/icon/perfil.png"><span>Perfil</span></li>
  </a>

  <a href="__ativarentidade/remover">
    <li class="lastchild"><img src="web/img/icon/remover.png"><span>Remover</span></li>
  </a>

  <?php if (Util::isMobile()): ?>
    </div>
  <?php endif; ?>

<?php endif; ?>
