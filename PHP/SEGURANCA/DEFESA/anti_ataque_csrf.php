<?php $_SESSION['CSRF'] = $_SESSION['CSRF'] ?? hash('sha512', rand(100,1000)); ?>

<!-- // formulario -->
<form class="" action="" method="post">
<input type="hidden" name="csrf_valida" value="<?php echo $_SESSION['CSRF']; ?>">
</form>

<?php
// validando
if ($_POST['csrf_valida'] != $_SESSION['CSRF']) {
  die("ocorreu algum erro, feche e abra o navegador novamente");
}


//se o cadastro occorrer com sucesso atualize a variavel $_SESSION['CSRF']
$_SESSION['CSRF'] = hash('sha512', rand(100,1000));

?>
