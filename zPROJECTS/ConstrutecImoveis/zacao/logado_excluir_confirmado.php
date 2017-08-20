<?php permissao_logado();
$id = $url->vars()[0];
$imovel = CRUD::select('imovel', 'endereco_id', 'id = ?', [$id]);
$endereco_id = $imovel[0]['endereco_id'];

$imoveis = CRUD::select('imovel i, endereco e', '*', 'i.endereco_id = e.id AND e.id = ?', [$endereco_id]);

if (count($imoveis) < 2) {
  CRUD::delete('imovel ', 'id = ?', [$id]);
  CRUD::delete('endereco ', 'id = ?', [$endereco_id]);
} else {
  CRUD::delete('imovel ', 'id = ?', [$id]);
}
  
