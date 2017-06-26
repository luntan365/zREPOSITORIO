<?php if (!isset($_SESSION['usuario']['id'])) { header("Location: ".DOMINIO); } ?>
<link rel="stylesheet" href="css/adocoes.css">
<div class="minhas-adocoes">


<h1>ADOÇÕES</h1>

    <?php
    $minhasadocoes = $crud->select_adocoes_usuario_id($_SESSION['usuario']['id']);
    foreach ($minhasadocoes as $value):
    $pet = $crud->select_pet_id($value['animal_id']);
    $user = $crud->select_usuario_id($pet['usuario_id']);
    ?>

    <div class="<?php echo $value['status'] ?>">
      <div class="caixa-status">
        <h2>Status da doação</h2>
        <h3><?php echo $value['status'] ?></h3>
      </div>

      <div class="caixa-pet">
        <h2>PET</h2>
        <img src="<?php echo $pet['foto']; ?>" alt="foto pet">
        <p><?php echo $pet['nome'] ?></p>
      </div>
      <div class="caixa-adotante">
        <h2>Doador</h2>
        <img src="<?php echo $user['foto']; ?>" alt="foto">
        <p><?php echo $user['nome'] ?></p>
      </div>
    </div>

    <?php endforeach; ?>
</div>
