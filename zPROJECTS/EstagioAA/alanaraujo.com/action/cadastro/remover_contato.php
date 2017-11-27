<?php 

  $index = $url_route->getVar();
  $super_entidade = SESSION::ss('cadastro_superentidade');

  if ($super_entidade) {
    $contato = $super_entidade->contato();
    unset($contato[$index]);
    $super_entidade->contato($contato);
    SESSION::ss('cadastro_superentidade', $super_entidade);
  }

  header("Location: ".DOMINIO."cadastro/cadastro3");
  exit;
