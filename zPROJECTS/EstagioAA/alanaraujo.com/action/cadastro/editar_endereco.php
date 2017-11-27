<?php 

  $index = $url_route->getVar();
  $super_entidade = SESSION::ss('cadastro_superentidade');
  
  if ($super_entidade) {
    $enderecos = $super_entidade->endereco();
    $endereco_editado = $enderecos[$index];
    SESSION::ss('cadastro_endereco', $endereco_editado);

    $pec = CRUD::select('cidade c, estado e, pais p','c.estado_id, e.pais_id', 'c.id = ? && c.estado_id = e.id', $endereco_editado->cidade_id());
    $pec = $pec[0];    
    $_SESSION['cadastro_endereco_estado'] = $pec['estado_id'];
    $_SESSION['cadastro_endereco_pais'] = $pec['pais_id'];
        
    unset($enderecos[$index]);
    $super_entidade->endereco($enderecos);
    SESSION::ss('cadastro_superentidade', $super_entidade);
  }
  
  header("Location: ".DOMINIO."cadastro/cadastro2");
  exit;
