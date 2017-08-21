<?php permissao_logado();
$id = $url->vars()[0];
  $dados = CRUD::select('endereco e, imovel i', '*', 'i.endereco_id = e.id AND i.id = ?', [$id]);
  $value = $dados[0]
?>
<style media="screen">
  .selecionados {padding-top: 5px; padding-bottom: 5px;}
  span { margin-bottom: 4px; }
  .rotulo { font-weight: bold;}
</style>
<br><br><br>


<div class="row z-depth-1 selecionados grey lighten-4">

  <?php if ($value['categoria']=='casa'): ?>
    <span class="col s3 green-text rotulo">CASA</span>
  <?php elseif ($value['categoria']=='ap'): ?>
    <span class="col s3 purple-text rotulo">APARTAMENTO</span>
  <?php elseif ($value['categoria']=='comercial'): ?>
    <span class="col s3 pink-text rotulo">PONTO COMERCIAL</span>
  <?php endif; ?>

  <span class="col s3"><span class="blue-text">Valor R$</span>: <?php echo $value['valor']; ?></span>

  <?php if (!empty($value['referencia'])): ?>
    <span class="col s6"><span class="blue-text">Referência</span>: <?php echo $value['referencia']; ?></span>
  <?php endif; ?> 

  <span class="col s3"><span class="blue-text">Rua</span>: <?php echo $value['rua']; ?></span>
  
  <span class="col s3"><span class="blue-text">Número</span>: <?php echo $value['numero'];
   ?></span>

  <span class="col s3"><span class="blue-text">Bairro</span>: <?php echo $value['bairro'];
    ?></span>  

  <?php if ($value['quarto']!='0'): ?>
    <span class="col s3"><span class="blue-text">Quarto</span>: <?php echo $value['quarto']; ?></span>
  <?php endif; ?>
  
  <?php if ($value['suite']!='0'): ?>
    <span class="col s3"><span class="blue-text">Suite</span>: <?php echo $value['suite']; ?></span>
  <?php endif; ?>

  <?php if ($value['banheiro']!='0'): ?>
    <span class="col s3"><span class="blue-text">Banheiro Social</span>: <?php echo $value['banheiro']; ?></span>
  <?php endif; ?>

  <?php if ($value['garagem']!='0'): ?>
    <span class="col s3"><span class="blue-text">Capacidade da Garagem</span>: <?php echo $value['garagem']; ?></span>
  <?php endif; ?>

  <?php if ($value['quintal']!='0'): ?>
    <span class="col s3">Quintal</span>
  <?php endif; ?>

  <?php if ($value['varanda']!='0'): ?>
    <span class="col s3">Varanda</span>
  <?php endif; ?>

  <?php if (!empty($value['descricao'])): ?>
    <span class="col s6"><span class="blue-text">Descrição</span>: <?php echo $value['descricao']; ?></span>
  <?php endif; ?>
    
  </div>

  
  <div class="row">
    <div class="input-field col s2 offset-s4">
      <a href="logado_excluir_confirmado/<?php echo $id; ?>"><button class="btn waves-effect waves-light red" type="button" name="cadastrar">Excluir</button></a>
    </div>
    <div class="input-field col s2">
      <a href="home"><button class="btn waves-effect waves-light green" type="button" name="cancelar" >Cancelar</button></a>
    </div>
  </div>
