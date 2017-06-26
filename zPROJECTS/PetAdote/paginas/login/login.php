<?php function get_valor($keysession){
  if (!empty($_SESSION[$keysession])):
    echo $_SESSION[$keysession];
    unset($_SESSION[$keysession]);
  endif;
}
?>
<link rel="stylesheet" href="css/login.css">
<div class="login" >

  <form class="tela-login" action="login/logar" method="post">
    <label for="email">E-mail</label>
    <input type="email" name="email" value="<?php get_valor('email_login'); ?>">
    <label for="senha">Senha</label>
    <input type="password" name="senha" value="">
    <input type="submit" name="form-login" value="Logar">
  </form>

  <?php if (isset($_SESSION['login_report'])):?>
  <p><?php echo $_SESSION['login_report']; ?></p>
  <?php unset($_SESSION['login_report']); endif; ?>

</div>
