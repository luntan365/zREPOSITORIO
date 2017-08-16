<?php permissao_logado(); //verificar se esta logado, se nao, redireciona login ?>
<style media="screen">
  .formulario_cadastro .row .input-field input { margin-bottom: 0px; }
  .formulario_cadastro .row .caixa_check { padding-top: 28px; }
  #botao-adicionar { margin-top: 20px; }
</style>
<br>
<form class="formulario_cadastro" action="" method="post" autocomplete="off" enctype="multipart/form-data">
  
  <div class="row">
    
    <div class="input-field col s5">
      <input id="cd_rua" name="rua" type="text" maxlength="200" required>
      <label for="cd_rua">Rua</label>
    </div>

    <div class="input-field col s3 offset-s1">
      <input id="cd_numero" name="numero" type="number" required oninput="if(this.value.length>10) this.value = this.value.slice(0, 10);">
      <label for="cd_numero">Número</label>
    </div>

    <div class="input-field col s3">
      <input id="cd_valor" name="valor" type="number" required step="0.01" oninput="if(this.value.length>10) this.value = this.value.slice(0, 10);" >
      <label for="cd_valor">Valor R$</label>
    </div>
    
  </div>
  
  <div class="row">
    <div class="input-field col s5">
      <input id="cd_bairro" name="bairro" type="text" maxlength="200" required>
      <label for="cd_bairro">Bairro</label>
    </div>

    <div class="input-field col s6 offset-s1">
      <input id="cd_descricao" name="descricao" type="text" maxlength="2000">
      <label for="cd_descricao">Descrição</label>
    </div>
  </div>

  <div class="row">
    
    <div class="input-field col s5">
      <input id="cd_referencia" name="referencia" type="text" maxlength="200">
      <label for="cd_referencia">Ponto de Referência</label>
    </div>

    <div class="input-field col s2 offset-s1">
      <input id="cd_quarto" name="quarto" type="number" oninput="if(this.value.length>3) this.value = this.value.slice(0, 3);">
      <label for="cd_quarto">Quarto</label>
    </div>

    <div class="input-field col s2">
      <input id="cd_suite" name="suite" type="number" oninput="if(this.value.length>3) this.value = this.value.slice(0, 3);">
      <label for="cd_suite">Suite</label>
    </div>

    <div class="input-field col s2">
      <input id="cd_banheiro" name="banheiro" type="number" oninput="if(this.value.length>3) this.value = this.value.slice(0, 3);">
      <label for="cd_banheiro">Banheiro Social</label>
    </div>
    
  </div>

  <div class="row">
    <div class="col s5">
      <p>
        <input type="radio" name="tipo" value="casa" class="with-gap" id="cd_casa" required/>
        <label for="cd_casa">Casa</label>      
      </p>
      <p>
        <input type="radio" name="tipo" value="apartamento" class="with-gap" id="cd_ap" required/>
        <label for="cd_ap">Apartamento</label>
      </p>
      <p>
        <input type="radio" name="tipo" value="pontocomercial" class="with-gap" id="cd_comercial" required/>
        <label for="cd_comercial">Ponto Comercial</label>
      </p>    
    </div>    

    <div class="input-field col s2 offset-s1">
      <input id="cd_garagem" name="garagem" type="number" oninput="if(this.value.length>3) this.value = this.value.slice(0, 3);">
      <label for="cd_garagem">Carros na Garagem</label>
    </div>

    <div class="col s2 caixa_check">
      <input type="checkbox" name="quintal" class="filled-in" id="cd_quintal"/>
      <label for="cd_quintal">Quintal</label>
    </div>

    <div class="col s2 caixa_check">
      <input type="checkbox" name="varanda" class="filled-in" id="cd_varanda"/>
      <label for="cd_varanda">Varanda</label>
    </div>

    <div class="col s2 caixa_check offset-s1">
      <input type="checkbox" name="disponivel" class="filled-in" id="cd_disponivel" checked/>
      <label for="cd_disponivel">Disponível</label>
    </div>

    <div class="input-field col s1 offset-s1" id="botao-adicionar">
      <button class="btn waves-effect waves-light" type="submit" name="adicionar" formaction="cadastro_adicionar">Adicionar</button>
    </div>  
      
  </div>

  <!-- LISTA -->
  <div class="row">
      <div class="card-panel blue white-text"><?php 
      if (isset($_SESSION['cadastro'])) {
        var_dump($_SESSION['cadastro']); 
      }
      ?></div>
  </div>


  <div class="row">
    <div class="input-field col s2 offset-s4">
      <a href="cadastro_cadastrar"><button class="btn waves-effect waves-light green" type="button" name="cadastrar">Cadastrar</button></a>
    </div>
    <div class="input-field col s2">
      <a href="cadastro_cancelar"><button class="btn waves-effect waves-light red" type="button" name="cancelar" >Cancelar</button></a>
    </div>
  </div>
  
</form>
