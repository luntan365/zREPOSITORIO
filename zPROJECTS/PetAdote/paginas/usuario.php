<div class="">


  <?php
    $iduser = $urlamigavel->getVar(0);
    if (!empty($crud->select_usuario_adotante_meupet($_SESSION['usuario']['id'] ,$iduser))):
    $user = $crud->select_usuario_id($iduser);
    if (!empty($user)):
  ?>
  <link rel="stylesheet" href="css/usuario.css">
    <div class="usuario-view">
      <h1>Perfil do Usuário</h1>
      <?php if ($user['tipo']=='pessoa'): ?>

      <img src="<?php echo $user['foto']; ?>" alt="foto">
      <p>Nome: <?php echo $user['nome']; ?></p>
      <p>Sexo: <?php echo ucfirst($user['sexo']); ?></p>
      <p>Estado: <?php echo $user['estado']; ?></p>
      <p>Cidade: <?php echo $user['cidade']; ?></p>
      <p>E-mail: <?php echo $user['email']; ?></p>
      <p>Telefone: <?php echo $user['telefone']; ?></p>

      <?php elseif($user['tipo']=='instituicao'): ?>

        <img src="<?php echo $user['foto']; ?>" alt="foto">
        <p>Instituição: <?php echo $user['nome']; ?></p>
        <p>CNPJ: <?php echo ucfirst($user['cnpj']); ?></p>
        <p>Estado: <?php echo $user['estado']; ?></p>
        <p>Cidade: <?php echo $user['cidade']; ?></p>
        <p>Endereço: <?php echo $user['endereco']; ?></p>
        <p>E-mail: <?php echo $user['email']; ?></p>
        <p>Telefone: <?php echo $user['telefone']; ?></p>

      <?php endif; ?>
      <p><a href="doacoes">Voltar</a></p>
    </div>
  <?php else: ?>
    <p>Nenhum usuário encontrado.</p>
  <?php endif; ?>

<?php else: ?>
  <p>Você só poderá visualizar perfil de usuarios que estiverem na lista de espera dos seus pets ou já tenha algum pet seu.</p>
<?php endif; ?>
</div>
