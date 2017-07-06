<?php 

  $index = $url_route->getVar();
  $super_entidade = SESSION::ss('cadastro_superentidade');
  
  if ($super_entidade) {
    $enderecos = $super_entidade->endereco();
    unset($enderecos[$index]);
    $super_entidade->endereco($enderecos);
    SESSION::ss('cadastro_superentidade', $super_entidade);
  }
  
  header("Location: ".DOMINIO."cadastro/cadastro3");
  exit;
