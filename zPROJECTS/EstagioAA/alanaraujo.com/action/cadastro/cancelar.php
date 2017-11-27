<?php
  // entidade
  unset($_SESSION['cadastro_superentidade']);
  // endereço
  unset($_SESSION['cadastro_endereco']);
  unset($_SESSION['cadastro_endereco_estado']);
  unset($_SESSION['cadastro_endereco_pais']);

  header("Location: ".DOMINIO."cadastro");
  exit;
