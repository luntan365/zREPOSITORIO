<?php if (!isset($_SESSION['usuario']['id'])) { header("Location: ".DOMINIO); } ?>
<link rel="stylesheet" href="css/doacoes.css">
<div class="minhas-doacoes">
<h1>Doações em Andamento</h1>

<?php
  $meusadotantes = $crud->select_adotantes_pets($_SESSION['usuario']['id']);
  $organizando = [];
  foreach ($meusadotantes as $value) {
    $organizando[$value['animal_id']][]  = $value['usuario_id'];
  }

  foreach ($organizando as $ida => $idu):
    $pet = $crud->select_adotantes_pet_id($ida); ?>

  <div class="caixa">

    <div class="caixa-pet">
      <h2>PET</h2>
      <img src="<?php echo $pet['foto']; ?>" alt="foto pet">
      <p><?php echo $pet['nome'] ?></p>
    </div>



    <?php foreach ($organizando[$ida] as $value):
      $user = $crud->select_adotante_usuario_id($value); ?>
      <div class="caixa-adotante">
        <h2>Adotante</h2>
        <a href="usuario/<?php echo $value; ?>">
          <img src="<?php echo $user['foto']; ?>" alt="foto">
          <p><?php echo $user['nome'] ?></p>
        </a>
        <p class="comfirmar-adocao"><a href="doacoes/confirma-adocao/<?php echo $ida; ?>/<?php echo $value; ?>">Confirma Adoção</a></p>
      </div>
    <?php endforeach; ?>

  </div>

<?php endforeach; ?>
</div>


<!-- ================================================ -->


<div class="minhas-doacoes">
<h1>Doações Concluidas</h1>

  <?php $doacconc = $crud->select_doacoes_concluidas($_SESSION['usuario']['id']);

    foreach ($doacconc as $valores):
      $pet = $crud->select_adotantes_pet_id($valores['animal_id']); ?>

      <div class="doacoesconcluida">

        <div class="caixa-pet">
          <h2>PET</h2>
          <a href="pet/<?php echo $pet['id']; ?>">
            <img src="<?php echo $pet['foto']; ?>" alt="foto pet">
            <p><?php echo $pet['nome'] ?></p>
          </a>
        </div>

        <?php  $user = $crud->select_adotante_usuario_id($valores['usuario_id']); ?>
        <div class="caixa-adotante">
          <h2>Adotante</h2>
          <a href="usuario/<?php echo $user['id']; ?>">
            <img src="<?php echo $user['foto']; ?>" alt="foto">
            <p><?php echo $user['nome'] ?></p>
          </a>
        </div>

      </div>
  <?php endforeach; ?>

</div>
