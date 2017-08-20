<?php permissao_logado();
$index = $url->vars()[0];
unset($_SESSION['cadastro']['adicionados'][$index]);
