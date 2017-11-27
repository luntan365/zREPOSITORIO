<?php
$id = $url_route->getVar();
//========ENTIDADE==============//
$_SESSION['entidade_ativa'] = [];
$entidade = CRUD::select('entidade','*','id = ?', $id);
if (!empty($entidade)) {
$_SESSION['entidade_ativa'] = $entidade[0]['id'];
}
//========REDIRECIONAR==============//
header("Location: ".DOMINIO);
exit;
