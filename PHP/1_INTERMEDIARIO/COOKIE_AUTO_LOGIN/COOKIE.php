<?php
// setcookie('nome varivel', 'valor', 'data de espiração', 'pastaSalva', 'dominio');
// setcookie('nome', 'dejota', time()3600*24, 'dejota', '.dejota.com');


$variavel = 'valor defenindo para guardar no cookie.';
$tempo = time()+3600*24; //um dia para cookie ser apagado
setcookie('nome', $variavel, $tempo); //add ao cookie

 $valorCookie = $_COOKIE['nome']; //recuperando valor

echo $valorCookie;


?>
