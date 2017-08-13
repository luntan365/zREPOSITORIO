<style media="screen">
  .formulario_cadastro .row .input-field input { margin-bottom: 0px; }
  .formulario_cadastro .row .caixa_check { padding-top: 28px; }
  #botao-adicionar { margin-top: 20px; }
</style>
<br>
<form class="formulario_cadastro" action="logar" method="post" autocomplete="off" enctype="multipart/form-data">
  
  <div class="row">
    
    <div class="input-field col s5">
      <input id="cd_rua" name="rua" type="text">
      <label for="cd_rua">Rua</label>
    </div>

    <div class="input-field col s3 offset-s1">
      <input id="cd_numero" name="numero" type="number">
      <label for="cd_numero">Número</label>
    </div>

    <div class="input-field col s3">
      <input id="cd_valor" name="valor" type="number">
      <label for="cd_valor">Valor R$</label>
    </div>
    
  </div>
  
  <div class="row">
    <div class="input-field col s5">
      <input id="cd_bairro" name="bairro" type="text">
      <label for="cd_bairro">Bairro</label>
    </div>

    <div class="input-field col s6 offset-s1">
      <input id="cd_descricao" name="descricao" type="text">
      <label for="cd_descricao">Descrição</label>
    </div>
  </div>

  <div class="row">
    
    <div class="input-field col s5">
      <input id="cd_referencia" name="referencia" type="text">
      <label for="cd_referencia">Ponto de Referência</label>
    </div>

    <div class="input-field col s2 offset-s1">
      <input id="cd_quarto" name="quarto" type="number">
      <label for="cd_quarto">Quarto</label>
    </div>

    <div class="input-field col s2">
      <input id="cd_suite" name="suite" type="number">
      <label for="cd_suite">Suite</label>
    </div>

    <div class="input-field col s2">
      <input id="cd_banheiro" name="banheiro" type="number">
      <label for="cd_banheiro">Banheiro Social</label>
    </div>
    
  </div>

  <div class="row">
    <div class="col s5">
      <p>
        <input class="with-gap" name="tipo" type="radio" id="cd_casa" required/>
        <label for="cd_casa">Casa</label>      
      </p>
      <p>
        <input class="with-gap" name="tipo" type="radio" id="cd_ap" required/>
        <label for="cd_ap">Apartamento</label>
      </p>
      <p>
        <input class="with-gap" name="tipo" type="radio" id="cd_comercial" required/>
        <label for="cd_comercial">Ponto Comercial</label>
      </p>    
    </div>    

    <div class="input-field col s2 offset-s1">
      <input id="cd_garagem" name="garagem" type="number">
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

    <div class="input-field col s1 offset-s3" id="botao-adicionar">
      <button class="btn waves-effect waves-light" type="submit" name="adicionar" >Adicionar</button>
    </div>  
      
  </div>

  <div class="row">
      <div class="card-panel blue white-text">Adicionados</div>
  </div>


  <div class="row">
    <div class="input-field col s2 offset-s4">
      <button class="btn waves-effect waves-light green" type="submit" name="cadastrar" >Cadastrar</button> 
    </div>
    <div class="input-field col s2">
      <button class="btn waves-effect waves-light red" type="submit" name="cancelar" >Cancelar</button> 
    </div>
  </div>
  
</form>
