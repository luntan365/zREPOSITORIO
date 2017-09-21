<?php permissao_logado();
$id = $url->vars()[0];
  $dados = CRUD::select('endereco e, imovel i', '*', 'i.endereco_id = e.id AND i.id = ?', [$id]);
  $value = $dados[0]
?>
<style media="screen">
  .formulario_cadastro .row .input-field input { margin-bottom: 0px; }
  .formulario_cadastro .row .caixa_check { padding-top: 28px; }
  #botao-adicionar { margin-top: 20px; }
  .selecionados { padding-top: 5px; padding-bottom: 5px; }
</style>
<br>
<form class="formulario_cadastro" action="logado_alterar_dados_confirmado/<?php echo $id.'/'.$value['endereco_id']; ?>" method="post" autocomplete="off" enctype="multipart/form-data">

  <div class="row">

    <div class="input-field col s5">

      <input id="cd_rua" name="rua" type="text" maxlength="200" required tabindex="12" value="<?php echo $value['rua']; ?>">
      <label for="cd_rua">Rua</label>
    </div>

    <div class="input-field col s3 offset-s1">
      <input id="cd_numero" name="numero" type="text" required tabindex="1" maxlength="10" value="<?php echo $value['numero']; ?>">
      <label for="cd_numero">Número</label>
    </div>

    <div class="input-field col s3">
      <input id="cd_valor" name="valor" type="number"  min="0" required step="0.01"  tabindex="2" oninput="if(this.value.length>10) this.value = this.value.slice(0, 10);" value="<?php echo $value['valor']; ?>">
      <label for="cd_valor">Valor R$</label>
    </div>

  </div>

  <div class="row">
    <div class="input-field col s5">
      <input id="cd_bairro" name="bairro" type="text" maxlength="200" required tabindex="13" value="<?php echo $value['bairro']; ?>" >
      <label for="cd_bairro">Bairro</label>
    </div>

    <div class="input-field col s6 offset-s1">
      <input id="cd_descricao" name="descricao" type="text" maxlength="2000"  tabindex="3" value="<?php echo $value['descricao']; ?>">
      <label for="cd_descricao">Descrição</label>
    </div>
  </div>

  <div class="row">

    <div class="input-field col s5">
      <input id="cd_referencia" name="referencia" type="text" maxlength="200" tabindex="14" value="<?php echo $value['referencia']; ?>">
      <label for="cd_referencia">Referência</label>
    </div>

    <div class="input-field col s2 offset-s1">
      <input id="cd_quarto" name="quarto" type="number"  min="0" tabindex="4" oninput="if(this.value.length>3) this.value = this.value.slice(0, 3);" value="<?php if ($value['quarto'] > 0) { echo $value['quarto']; } ?>">
      <label for="cd_quarto">Quarto</label>
    </div>

    <div class="input-field col s2">
      <input id="cd_suite" name="suite" type="number"  min="0"  tabindex="5" oninput="if(this.value.length>3) this.value = this.value.slice(0, 3);" value="<?php if ($value['suite'] > 0) { echo $value['suite']; } ?>">
      <label for="cd_suite">Suite</label>
    </div>

    <div class="input-field col s2">
      <input id="cd_banheiro" name="banheiro" type="number"  min="0" tabindex="6" oninput="if(this.value.length>3) this.value = this.value.slice(0, 3);" value="<?php if ($value['banheiro'] > 0) { echo $value['banheiro']; } ?>">
      <label for="cd_banheiro">Banheiro Social</label>
    </div>

  </div>

  <div class="row">
    <div class="col s5">
      <p>
        <input type="radio" name="categoria" value="casa" class="with-gap" tabindex="15" id="cd_casa" required <?php if ($value['categoria']=="casa") { echo "checked"; } ?> />
        <label for="cd_casa">Casa</label>
      </p>
      <p>
        <input type="radio" name="categoria" value="ap" class="with-gap" tabindex="16" id="cd_ap" required <?php if ($value['categoria']=="ap") { echo "checked"; } ?>/>
        <label for="cd_ap">Apartamento</label>
      </p>
      <p>
        <input type="radio" name="categoria" value="comercial" class="with-gap" tabindex="17" id="cd_comercial" required <?php if($value['categoria']=="comercial") { echo "checked"; } ?>/>
        <label for="cd_comercial">Ponto Comercial</label>
      </p>
    </div>

    <div class="input-field col s2 offset-s1">
      <input id="cd_garagem" name="garagem" type="number"  min="0"  tabindex="7" oninput="if(this.value.length>3) this.value = this.value.slice(0, 3);" value="<?php if ($value['garagem'] > 0) { echo $value['garagem']; } ?>">
      <label for="cd_garagem">Capacidade Garagem</label>
    </div>

    <div class="col s2 caixa_check">
      <input type="checkbox" name="quintal" class="filled-in" tabindex="8" id="cd_quintal" <?php if ($value['quintal']>0) { echo "checked"; } ?> />
      <label for="cd_quintal">Quintal</label>
    </div>

    <div class="col s2 caixa_check">
      <input type="checkbox" name="varanda" class="filled-in" tabindex="9" id="cd_varanda" <?php if ($value['varanda']>0) { echo "checked"; } ?> />
      <label for="cd_varanda">Varanda</label>
    </div>

  </div>


  <div class="row">
    <div class="input-field col s2 offset-s4">
      <button class="btn waves-effect waves-light blue" type="submit" name="cadastrar">Alterar</button>
    </div>
    <div class="input-field col s2">
      <a href="home" tabindex="19"><button class="btn waves-effect waves-light red" type="button" name="cancelar" >Cancelar</button></a>
    </div>
  </div>

</form>
