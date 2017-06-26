<?php if (!isset($_SESSION['usuario']['id'])) { header("Location: ".DOMINIO); } ?>

<?php
function get_valor($keysession){
  if (isset($_SESSION['usuario'][$keysession])):
    echo $_SESSION['usuario'][$keysession];
  endif;
}
function get_erro($keysession){
  if (!empty($_SESSION[$keysession])):
    echo '<span class="erro">'.$_SESSION[$keysession].'</span>';
    unset($_SESSION[$keysession]);
  endif;
}

function input_checked($namesession, $valosession){
  if (isset($_SESSION['usuario'][$namesession]) && $_SESSION['usuario'][$namesession]==$valosession):
    echo 'checked';
  endif;
}
?>
<link rel="stylesheet" href="css/perfil.css">
  <!-- ===========ATUALIZAR DE IMAGEM PERFIL====================== -->
  <div class="alterar-foto">
    <form action="perfil/validar_update_foto" method="post" enctype="multipart/form-data">

      <div class="">
        <img  src="<?php get_valor('foto'); ?>" alt="foto">
        <label for="foto">Alterar Foto</label>
          <input type="file" name="foto" required="" id="carrega" value="Carrega">
          <?php get_erro('erro_validacao_foto'); ?>
      </div>
<br>
      <div class="">
        <input type="submit" value="Alterar Foto">
      </div>

    </form>
  </div>

  <!-- ===========ATUALIZAR DE EMAIL====================== -->
  <div class="alterar-email">
    <form action="perfil/validar_update_email" method="post" enctype="multipart/form-data">

      <div class="">

        <div class="">
            <label for="email">E-mail</label>
            <input type="text" name="email" required="" value="<?php get_valor('email'); ?>">
            <?php get_erro('erro_validacao_email'); ?>
        </div>

        <div class="">
            <label for="emailcomfirma">Confirmar E-mail</label>
            <input type="text" name="emailcomfirma" required="" value="<?php get_valor('email'); ?>">
            <?php get_erro('erro_validacao_emailcomfirma'); ?>
        </div>

      </div>
<br>
      <div class="">
        <input type="submit" value="Alterar E-mail">
      </div>

    </form>
  </div>


  <!-- ===========ATUALIZAR DE SENHA========================== -->
  <div class="alterar-senha">
    <form action="perfil/validar_update_senha" method="post" enctype="multipart/form-data">

      <div class="">
          <label for="password">Senha Atual</label>
          <input type="password" name="senha" required="" value="">
          <?php get_erro('erro_validacao_senha'); ?>
      </div>

      <div class="">
          <label for="password">Nova Senha</label>
          <input type="password" name="novasenha" required="" value="">
          <?php get_erro('erro_validacao_novasenha'); ?>
      </div>

      <div class="">
          <label for="senhaconfirme">Confirmar Nova Senha</label>
          <input type="password" name="novasenhaconfirme" required="" value="">
          <?php get_erro('erro_validacao_novasenhaconfirme'); ?>
      </div>
<br>
      <div class="">
        <input type="submit" value="Alterar Senha">
      </div>

    </form>
  </div>


<?php
  if ($_SESSION['usuario']['tipo']=='pessoa') {
    require_once 'perfil_pessoa.php';
  } elseif($_SESSION['usuario']['tipo']=='instituicao') {
    require_once 'perfil_instituicao.php';
  }
?>
