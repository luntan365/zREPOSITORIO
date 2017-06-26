
<?php
$c1 = $crud->select_login($_POST['email'], $_POST['senha']);
if (!empty($c1)) {
  session_regenerate_id();
  session_unset();
  $_SESSION['usuario'] = $c1;
  $crud->update_data_acesso($_SESSION['usuario']['id']);
  header("Location: ".DOMINIO);
} else {
  $_SESSION['email_login'] = $_POST['email'];
  $_SESSION['login_report'] = "E-mail ou senha invalido.";
  header("Location: ".DOMINIO."login");
}
