<?php if (!isset($_SESSION['usuario']['id'])) { header("Location: ".DOMINIO); } ?>
<?php
function get_valor($keysession){
  if (!empty($_SESSION[$keysession])):
    echo $_SESSION[$keysession];
    unset($_SESSION[$keysession]);
  endif;
}
function get_erro($keysession){
  if (!empty($_SESSION[$keysession])):
    echo '<span class="erro">'.$_SESSION[$keysession].'</span>';
    unset($_SESSION[$keysession]);
  endif;
}
?>
<link rel="stylesheet" href="css/meuspets.css">
<div class="add-pets">
  <h2>Adicionar Pet</h2>

  <?php get_erro('limite_pets'); ?>

  <div class="">
    <form class="" action="meuspets/validar_pet" method="post" enctype="multipart/form-data">

      <div class="">
        <label for="foto">Foto do Pet</label>
          <input type="file" name="foto" value="Carrega" required="">
          <?php get_erro('erro_validacao_foto'); ?>
      </div>



      <div class="">
        <label for="especie">Espécie</label>
        <select name="especie" id="especie" required="" value="<?php get_valor('salvo_valida_especie'); ?>"></select>
        <?php get_erro('erro_validacao_especie'); ?>
      </div>


      <div class="">
          <label for="nome">Nome</label>
          <input type="text" name="nome" required="" value="<?php get_valor('salvo_valida_nome'); ?>">
          <?php get_erro('erro_validacao_nome'); ?>
      </div>

      <div class="">
          <label for="idade">Idade</label>
          <input type="text" name="idade" required="" value="<?php get_valor('salvo_valida_idade'); ?>">
          <?php get_erro('erro_validacao_idade'); ?>
      </div>

      <div class="">
          <label for="raca">Raça</label>
          <input type="text" name="raca" required="" value="<?php get_valor('salvo_valida_raca'); ?>">
          <?php get_erro('erro_validacao_raca'); ?>
      </div>

      <div class="">
          <label for="descricao">Descrição</label>
          <br>
          <textarea name="descricao" required="" rows="5" cols="40" maxlength="1000"><?php get_valor('salvo_valida_descricao'); ?></textarea>
          <?php get_erro('erro_validacao_descricao'); ?>
      </div>


      <div class="">
        <input type="submit" value="Adicionar Pet">
      </div>

    </form>
  </div>



</div>

    <?php
      $meuspests = $crud->select_lista_meuspets($_SESSION['usuario']['id']);
      foreach ($meuspests as $value): ?>
      <div class="meus-pets">
        <img src="<?php echo $value['foto']; ?>" alt="foto pet">
        <p>Nome: <?php echo $value['nome'] ?></p>
        <p>Espécie: <?php echo $value['especie'] ?></p>
        <p>Idade: <?php echo $value['idade'] ?></p>
        <p>Raça: <?php echo $value['raca'] ?></p>
        <p>Descricao: <?php echo $value['descricao'] ?></p>
        <p><a href="meuspets/excluir/<?php echo $value['id'] ?>">Excluir</a></p>
      </div>
    <?php endforeach; ?>







<script type="text/javascript" src="js/especies-pet.js" charset="utf-8"></script>
