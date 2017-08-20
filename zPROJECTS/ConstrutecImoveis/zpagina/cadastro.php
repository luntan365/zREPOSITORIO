<?php permissao_logado(); //verificar se esta logado, se nao, redireciona login ?>
<style media="screen">
  .formulario_cadastro .row .input-field input { margin-bottom: 0px; }
  .formulario_cadastro .row .caixa_check { padding-top: 28px; }
  #botao-adicionar { margin-top: 20px; }
  .selecionados { padding-top: 5px; padding-bottom: 5px; }
</style>
<br>
<form class="formulario_cadastro" action="" method="post" autocomplete="off" enctype="multipart/form-data">
  
  <div class="row">
    
    <div class="input-field col s5">
      
      <input id="cd_rua" name="rua" type="text" maxlength="200" required tabindex="12" value="<?php if (isset($_SESSION['cadastro']['rua'])) { echo $_SESSION['cadastro']['rua']; } ?>">
      <label for="cd_rua">Rua</label>
    </div>

    <div class="input-field col s3 offset-s1">
      <input id="cd_numero" name="numero" type="text" required tabindex="1" maxlength="10">
      <label for="cd_numero">Número</label>
    </div>

    <div class="input-field col s3">
      <input id="cd_valor" name="valor" type="number" required step="0.01"  tabindex="2" oninput="if(this.value.length>10) this.value = this.value.slice(0, 10);" >
      <label for="cd_valor">Valor R$</label>
    </div>
    
  </div>
  
  <div class="row">
    <div class="input-field col s5">
      <input id="cd_bairro" name="bairro" type="text" maxlength="200" required tabindex="13" value="<?php if (isset($_SESSION['cadastro']['bairro'])) { echo $_SESSION['cadastro']['bairro']; } ?>">
      <label for="cd_bairro">Bairro</label>
    </div>

    <div class="input-field col s6 offset-s1">
      <input id="cd_descricao" name="descricao" type="text" maxlength="2000"  tabindex="3">
      <label for="cd_descricao">Descrição</label>
    </div>
  </div>

  <div class="row">
    
    <div class="input-field col s5">
      <input id="cd_referencia" name="referencia" type="text" maxlength="200" tabindex="14" value="<?php if (isset($_SESSION['cadastro']['referencia'])) { echo $_SESSION['cadastro']['referencia']; } ?>">
      <label for="cd_referencia">Referência</label>
    </div>

    <div class="input-field col s2 offset-s1">
      <input id="cd_quarto" name="quarto" type="number" tabindex="4" oninput="if(this.value.length>3) this.value = this.value.slice(0, 3);">
      <label for="cd_quarto">Quarto</label>
    </div>

    <div class="input-field col s2">
      <input id="cd_suite" name="suite" type="number"  tabindex="5" oninput="if(this.value.length>3) this.value = this.value.slice(0, 3);">
      <label for="cd_suite">Suite</label>
    </div>

    <div class="input-field col s2">
      <input id="cd_banheiro" name="banheiro" type="number" tabindex="6" oninput="if(this.value.length>3) this.value = this.value.slice(0, 3);">
      <label for="cd_banheiro">Banheiro Social</label>
    </div>
    
  </div>

  <div class="row">
    <div class="col s5">
      <p> 
        <input type="radio" name="categoria" value="casa" class="with-gap" tabindex="15" id="cd_casa" required <?php if (isset($_SESSION['cadastro']['categoria']) && $_SESSION['cadastro']['categoria']=="casa") { echo "checked"; } ?> />
        <label for="cd_casa">Casa</label>      
      </p>
      <p>
        <input type="radio" name="categoria" value="ap" class="with-gap" tabindex="16" id="cd_ap" required <?php if (isset($_SESSION['cadastro']['categoria']) && $_SESSION['cadastro']['categoria']=="ap") { echo "checked"; } ?>/>
        <label for="cd_ap">Apartamento</label>
      </p>
      <p>
        <input type="radio" name="categoria" value="comercial" class="with-gap" tabindex="17" id="cd_comercial" required <?php if (isset($_SESSION['cadastro']['categoria']) && $_SESSION['cadastro']['categoria']=="comercial") { echo "checked"; } ?>/>
        <label for="cd_comercial">Ponto Comercial</label>
      </p>    
    </div>    

    <div class="input-field col s2 offset-s1">
      <input id="cd_garagem" name="garagem" type="number"  tabindex="7" oninput="if(this.value.length>3) this.value = this.value.slice(0, 3);">
      <label for="cd_garagem">Carros na Garagem</label>
    </div>

    <div class="col s2 caixa_check">
      <input type="checkbox" name="quintal" class="filled-in" tabindex="8" id="cd_quintal"/>
      <label for="cd_quintal">Quintal</label>
    </div>

    <div class="col s2 caixa_check">
      <input type="checkbox" name="varanda" class="filled-in" tabindex="9" id="cd_varanda"/>
      <label for="cd_varanda">Varanda</label>
    </div>

    <div class="col s2 caixa_check offset-s1">
      <input type="checkbox" name="status" class="filled-in"  tabindex="10" id="cd_disponivel" checked/>
      <label for="cd_disponivel">Disponível</label>
    </div>

    <div class="input-field col s1 offset-s1" id="botao-adicionar">
      <button class="btn waves-effect waves-light" type="submit"  tabindex="11" name="adicionar" formaction="cadastro_adicionar">Adicionar</button>
    </div>  
      
  </div>

  <!--======================= LISTA ========================================-->
   
<?php if (!empty($_SESSION['cadastro']['adicionados'])): ?>
  
  
    <?php foreach ($_SESSION['cadastro']['adicionados'] as $key => $value): ?>
      
      <div class="row z-depth-1 selecionados grey lighten-4">
        
        <span class="col s3"><a href="<?php echo "cadastro_remover/".$key; ?>" class="red-text">Clique aqui para remover !!!</a></span>

        <?php if ($value['status']=="disponivel"): ?>        
          <span class="col s3  green-text text-accent-4"><?php echo "Disponivel"; ?></span>
        <?php else: ?>
          <span class="col s3  orange-text text-accent-4"><?php echo "Indisponivel"; ?></span>
        <?php endif; ?>
    
        <span class="col s3"><span class="blue-text">Número</span>: <?php echo $value['numero']; ?></span>
        <span class="col s3"><span class="blue-text">Valor R$</span>: <?php echo $value['valor']; ?></span>
        
        <?php if (isset($value['quarto'])): ?>
          <span class="col s3"><span class="blue-text">Quarto</span>: <?php echo $value['quarto']; ?></span>
        <?php endif; ?>
        
        <?php if (isset($value['suite'])): ?>
          <span class="col s3"><span class="blue-text">Suite</span>: <?php echo $value['suite']; ?></span>
        <?php endif; ?>

        <?php if (isset($value['banheiro'])): ?>
          <span class="col s3"><span class="blue-text">Banheiro Social</span>: <?php echo $value['banheiro']; ?></span>
        <?php endif; ?>

        <?php if (isset($value['garagem'])): ?>
          <span class="col s3"><span class="blue-text">Carros na Garagem</span>: <?php echo $value['garagem']; ?></span>
        <?php endif; ?>

        <?php if (isset($value['quintal'])): ?>
          <span class="col s3">Quintal</span>
        <?php endif; ?>

        <?php if (isset($value['varanda'])): ?>
          <span class="col s3">Varanda</span>
        <?php endif; ?>

        <?php if (isset($value['descricao'])): ?>
          <span class="col s6"><span class="blue-text">Descrição</span>: <?php echo $value['descricao']; ?></span>
        <?php endif; ?>

      </div>   

    
    <?php endforeach; ?>     
 


  <div class="row">
    <div class="input-field col s2 offset-s4">
      <a href="cadastro_cadastrar" tabindex="18"><button class="btn waves-effect waves-light green" type="button" name="cadastrar">Cadastrar</button></a>
    </div>
    <div class="input-field col s2">
      <a href="cadastro_cancelar" tabindex="19"><button class="btn waves-effect waves-light red" type="button" name="cancelar" >Cancelar</button></a>
    </div>
  </div>
  
<?php endif; ?>

</form>
