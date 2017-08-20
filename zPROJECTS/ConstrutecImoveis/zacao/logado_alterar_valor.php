<?php permissao_logado();
if ($_SERVER['REQUEST_METHOD']=='POST'):
$id = $url->vars()[0];
$valor = trim($_POST['valor']);
CRUD::update('imovel', ['valor'=>$valor], 'id = ?', [$id]);
endif;
?>
