
<form class="" action="__cadastro/validar" autocomplete="off" method="post" enctype="multipart/form-data">
  <?php
  require_once DIRETORIO_RAIZ."/web/page/cadastro/form/1_entidade.php";
  require_once DIRETORIO_RAIZ."/web/page/cadastro/form/2_pessoa_juridica.php";
  require_once DIRETORIO_RAIZ."/web/page/cadastro/form/3_pessoa_fisica.php";
  require_once DIRETORIO_RAIZ."/web/page/cadastro/form/4_categoria.php";
  ?>
  <div class="botoes">
    <input type="submit" name="submit" class="botao-confirma" value="Continuar">
    <input type="submit" name="submit" class="botao-gritando" value="Etapa Final" formaction="__cadastro/validar_final">
    <a href="__cadastro/cancelar"><input type="button" name="submit" class="botao-cancela" value="Cancelar"></a>
  </div>

</form>

<script src="web/js/pj_pf.js" charset="utf-8"></script>
<script src="web/js/validadores/cpf.js" charset="utf-8"></script>
<script src="web/js/validadores/data_nascimento.js" charset="utf-8"></script>
<script src="web/js/validadores/cnpj.js" charset="utf-8"></script>
