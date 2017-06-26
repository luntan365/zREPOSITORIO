<?php

if (isset($_SESSION['usuario']['id'])) {
  if (!isset($_SESSION['pes_pet_especie']) || !isset($_SESSION['pes_pet_estado']) || !isset($_SESSION['pes_pet_cidade']))  {
    $_SESSION['pes_pet_especie'] = '';
    $_SESSION['pes_pet_estado'] = $_SESSION['usuario']['estado'];
    $_SESSION['pes_pet_cidade'] = $_SESSION['usuario']['cidade'];
    header("Location: ".DOMINIO."pets/pesquisa");
  }
}else{
  if (!isset($_SESSION['pes_pet_especie']) || !isset($_SESSION['pes_pet_estado']) || !isset($_SESSION['pes_pet_cidade']))  {
    $_SESSION['pes_pet_especie'] = '';
    $_SESSION['pes_pet_estado'] = '';
    $_SESSION['pes_pet_cidade'] = '';
  }
}

if (!isset($_SESSION['pesquisa_pet'])) {
  header("Location: ".DOMINIO."pets/pesquisa");
}


?>
<link rel="stylesheet" href="css/pets.css">
<div class="pets-conteiner">
  <div class="pets-pesquisa">
    <form class="" action="pets/pesquisa" method="post" enctype="multipart/form-data">

      <label for="especie">Espécie</label>
      <select class="select" id="especie" name="especie" value="<?php echo $_SESSION['pes_pet_especie']; ?>"></select>

      <label for="estado">Estado</label>
      <select class="select" id="estado" name="estado" value="<?php echo $_SESSION['pes_pet_estado']; ?>"></select>

      <label for="cidade">Cidade</label>
      <select class="select" id="cidade" name="cidade" value="<?php echo $_SESSION['pes_pet_cidade']; ?>"></select>

      <input class="select" type="submit" name="" value="Pesquisar">

    </form>
  </div>

  <div class="pets-navegacao">
    <a href="pets/qntpets/inicio"><button type="button" name="button">Inicio</button></a>
    <a href="pets/qntpets/voltar"><button type="button" name="button">Voltar</button></a>
    <a href="pets/qntpets/avancar"><button type="button" name="button">Avançar</button></a>
  </div>

  <div class="pet-lista-pets">
    <?php
      if (!empty($_SESSION['pesquisa_pet'])):
        foreach ($_SESSION['pesquisa_pet'] as $value): ?>

        <!-- PET FOTO E NOME -->
        <a href="pet/<?php echo $value['id']; ?>">
          <figure>
            <img src="<?php echo $value['foto']; ?>" alt="foto pet">
            <figcaption><?php echo $value['nome'] ?></figcaption>
          </figure>
        </a>


        <?php
        endforeach;
        unset($_SESSION['pesquisa_pet']);
      else: ?>

      <p>Nenhum resultado encontrado nas seguintes condições;</p>
      <p>Espécie: <?php echo $_SESSION['pes_pet_especie']; ?></p>
      <p>Estado: <?php echo $_SESSION['pes_pet_estado']; ?></p>
      <p>Cidade: <?php echo $_SESSION['pes_pet_cidade']; ?></p>
      <p>Efetue uma nova pesquisa se desejar.</p>

    <?php endif; ?>

  </div>


</div>


<script src="js/cidades-estados.js" charset="utf-8"></script>
<script src="js/especies-pet.js" charset="utf-8"></script>
<script type="text/javascript">
  window.onload = function () {
    run_especies_pet('especie');
    run_cidades_estados('estado', "cidade");
  }
</script>
