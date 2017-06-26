<div class="">

  <?php
    $idpet = $urlamigavel->getVar(0);
    $pet = $crud->select_pet_id($idpet);

    ?>
    <?php if (!empty($pet)): ?>
    <link rel="stylesheet" href="css/pet.css">
    <div class="pet-view">
    <h1>Perfil do Pet</h1>

      <img src="<?php echo $pet['foto']; ?>" alt="foto pet">
      <p>Espécie: <?php echo $pet['especie'] ?></p>
      <p>Nome: <?php echo $pet['nome'] ?></p>
      <p>Idade: <?php echo $pet['idade'] ?></p>
      <p>Raça: <?php echo $pet['raca'] ?></p>
      <p>Descricao: <?php echo $pet['descricao'] ?></p>

      <?php if ($pet['status']==0): ?>
        <?php if (isset($_SESSION['usuario']['id'])): ?>
          <?php if (empty($crud->select_adocao_lista_esta($idpet, $_SESSION['usuario']['id']))): ?>
            <p><a class="entrar-lista-adocao" href="pet/adotar/<?php echo $idpet ?>">Entrar na lista de adoção</a></p>
          <?php else: ?>
            <p><a class="sair-lista-adocao" href="pet/sair/<?php echo $idpet ?>">Sair da lista de adoção</a></p>
          <?php endif; ?>
        <?php else: ?>
          <p><a href="login">Efetue o login para  poder adotar um pet</a></p>
        <?php endif; ?>
      <?php endif; ?>

      <?php
        if (!empty($_SESSION['adocao_erro'])){
        echo '<span class="erro">'.$_SESSION['adocao_erro'].'</span>';
        unset($_SESSION['adocao_erro']);
        }
      ?>
    <p><a href="pets">Voltar para os Pets</a></p>
    <p><a href="doacoes">Voltar para as Doações</a></p>
    </div>

  <?php else: ?>
    <p>Nenhum pet encontrado.</p>
  <?php endif; ?>


</div>
