<?php permissao_logado();
$id = $url->vars()[0];
CRUD::update('imovel', ['status'=>'disponivel'], 'id = ?', [$id]);
