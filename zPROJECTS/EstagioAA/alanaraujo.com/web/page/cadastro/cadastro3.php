
<?php
require_once DIRETORIO_RAIZ."/web/page/cadastro/show/1_entidade.php";
require_once DIRETORIO_RAIZ."/web/page/cadastro/show/2_pessoa_juridica.php";
require_once DIRETORIO_RAIZ."/web/page/cadastro/show/3_pessoa_fisica.php";
require_once DIRETORIO_RAIZ."/web/page/cadastro/show/4_categoria.php";
require_once DIRETORIO_RAIZ."/web/page/cadastro/show/7_contato.php";
require_once DIRETORIO_RAIZ."/web/page/cadastro/show/5_endereco.php";
require_once DIRETORIO_RAIZ."/web/page/cadastro/show/6_conta_bancaria.php";
?>

<!-- COMFIRMA VOLTAR OU CANCELA -->
<div class="botoes">
  <a href="__cadastro/cadastrar"><input type="button" name="submit" class="botao-confirma" value="Cadastrar"></a>
  <a href="cadastro/cadastro2"><input type="button" name="submit" class="botao-neutro" value="Voltar"></a>
  <a href="cadastro/cadastro"><input type="button" name="submit" class="botao-gritando" value="Etapa Inicial"></a>
  <a href="__cadastro/cancelar"><input type="button" name="submit" class="botao-cancela" value="Cancelar"></a>
</div>
