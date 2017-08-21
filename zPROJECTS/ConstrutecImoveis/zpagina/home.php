<?php
if (isset($_SESSION['pesquisa']['where'])) {
  $where = $_SESSION['pesquisa']['where'];
  $where_dados = $_SESSION['pesquisa']['dados'];
} else {
  if (empty($_SESSION['usuario'])){
    $where = 'i.endereco_id = e.id AND status = ? ORDER BY i.valor ASC';
    $where_dados = ['disponivel'];
  } else {
    $where = 'i.endereco_id = e.id ORDER BY i.valor ASC';
    $where_dados = [];
  }
}
$dados = CRUD::select('endereco e, imovel i', '*', $where, $where_dados);
?>
<style media="screen">
  .selecionados {padding-top: 10px; padding-bottom: 5px;}
  span { margin-bottom: 4px; }
  .rotulo { font-weight: bold;}
</style>

<?php foreach ($dados as $key => $value): ?>
  
  <div class="row z-depth-1 selecionados grey lighten-2">

    <?php if ($value['categoria']=='casa'): ?>
      <span class="col s3 green-text rotulo">CASA</span>
    <?php elseif ($value['categoria']=='ap'): ?>
      <span class="col s3 purple-text rotulo">APARTAMENTO</span>
    <?php elseif ($value['categoria']=='comercial'): ?>
      <span class="col s3 pink-text rotulo">PONTO COMERCIAL</span>
    <?php endif; ?>

    <span class="col s3"><span class="blue-text text-darken-4">Valor R$</span>: <?php echo $value['valor']; ?></span>

    <?php if (!empty($value['referencia'])): ?>
      <span class="col s6"><span class="blue-text text-darken-4">Referência</span>: <?php echo $value['referencia']; ?></span>
    <?php endif; ?> 

    <span class="col s3"><span class="blue-text text-darken-4">Rua</span>: <?php echo $value['rua']; ?></span>
    
    <span class="col s3"><span class="blue-text text-darken-4">Número</span>: <?php echo $value['numero'];
     ?></span>

    <span class="col s3"><span class="blue-text text-darken-4">Bairro</span>: <?php echo $value['bairro'];
      ?></span>  

    <?php if ($value['quarto']!='0'): ?>
      <span class="col s3"><span class="blue-text text-darken-4">Quarto</span>: <?php echo $value['quarto']; ?></span>
    <?php endif; ?>
    
    <?php if ($value['suite']!='0'): ?>
      <span class="col s3"><span class="blue-text text-darken-4">Suite</span>: <?php echo $value['suite']; ?></span>
    <?php endif; ?>

    <?php if ($value['banheiro']!='0'): ?>
      <span class="col s3"><span class="blue-text text-darken-4">Banheiro Social</span>: <?php echo $value['banheiro']; ?></span>
    <?php endif; ?>

    <?php if ($value['garagem']!='0'): ?>
      <span class="col s3"><span class="blue-text text-darken-4">Capacidade da Garagem</span>: <?php echo $value['garagem']; ?></span>
    <?php endif; ?>

    <?php if ($value['quintal']!='0'): ?>
      <span class="col s3">Quintal</span>
    <?php endif; ?>

    <?php if ($value['varanda']!='0'): ?>
      <span class="col s3">Varanda</span>
    <?php endif; ?>

    <?php if (!empty($value['descricao'])): ?>
      <span class="col s6"><span class="blue-text text-darken-4">Descrição</span>: <?php echo $value['descricao']; ?></span>
    <?php endif; ?>

    <?php if (!empty($_SESSION['usuario'])): ?>

      <div class="row col s12">
      <br>
          <form class="" action="logado_alterar_valor/<?php echo $value['id']; ?>" method="post" enctype="multipart/form-data">
          
          <div class="input-field col s2">
            <input id="cd_valor" name="valor" type="number" required step="0.01" oninput="if(this.value.length>10) this.value = this.value.slice(0, 10);" >
            <label for="cd_valor">Novo Valor R$</label>
          </div>
          <button type="submit" name="submit" class="btn purple">Alterar Valor</button>      
          
        <a href="logado_excluir/<?php echo $value['id']; ?>"><button type="button" name="button" class="btn red">excluir</button></a>
        <a href="logado_alterar_dados/<?php echo $value['id']; ?>"><button type="button" name="button" class="btn blue">Alterar Dados</button></a>
        
        <?php if ($value['status']=='indisponivel'): ?>
          <a href="logado_alterar_disponivel/<?php echo $value['id']; ?>"><button type="button" name="button" class="btn orange">Estar Indisponivel</button></a>
        <?php else: ?>
          <a href="logado_alterar_indisponivel/<?php echo $value['id']; ?>"><button type="button" name="button" class="btn green">Estar Disponivel</button></a>
        <?php endif; ?>

        
        </form>              
      </div>

      
    <?php endif; ?>
    

  </div>   


<?php endforeach; ?>    
