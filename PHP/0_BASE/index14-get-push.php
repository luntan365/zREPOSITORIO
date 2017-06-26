<?php
  if (count($_POST)) {
    echo "Nome: " . ($_POST['nome']);
    echo "<br>";
    echo "Email: " . ($_POST['email']);
  } else {
  echo var_dump($_POST);
  }



?>
