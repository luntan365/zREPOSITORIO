<?php 

  $index = $url_route->getVar();
  $super_entidade = SESSION::ss('cadastro_superentidade');

  if ($super_entidade) {
    $contato = $super_entidade->contato();
    $contato_editado = $contato[$index];   
    SESSION::ss('cadastro_contato', $contato_editado); 
    unset($contato[$index]);
    $super_entidade->contato($contato);
    SESSION::ss('cadastro_superentidade', $super_entidade);    
  }

  header("Location: ".DOMINIO."cadastro/cadastro2");
  exit;
