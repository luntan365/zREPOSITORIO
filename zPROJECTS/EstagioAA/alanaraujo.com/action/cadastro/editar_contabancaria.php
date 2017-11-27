<?php 

  $index = $url_route->getVar();
  $super_entidade = SESSION::ss('cadastro_superentidade');
  
  if ($super_entidade) {
    $contabancaria = $super_entidade->conta_bancaria();
    $contabancaria_editada = $contabancaria[$index];
    SESSION::ss('cadastro_contabancaria', $contabancaria_editada);
    unset($contabancaria[$index]);
    $super_entidade->conta_bancaria($contabancaria);
    SESSION::ss('cadastro_superentidade', $super_entidade);    
  }
  
  header("Location: ".DOMINIO."cadastro/cadastro2");
  exit;
