<?php
error_reporting(E_ALL);
date_default_timezone_set("America/Fortaleza");
mb_internal_encoding('UTF-8');
mb_http_output('UTF-8');

//DATABASE ACCESSS
define('HOST', 'localhost');
define('DATABASE', 'smashsystem_com_br');
define('USER', 'smashsystem_com_br');
define('PASS', 'ss0123');

//DATABASE LOCAL DESENVOLVIMENTO
define('HOST_TESTE', 'localhost');
define('DATABASE_TESTE', 'alanaraujo');
define('USER_TESTE', 'root');
define('PASS_TESTE', '');

//VARIAVEIS DE ACESSO GLOBAL
define('DOMINIO',(!empty($_SERVER['HTTPS'])?'https':'http').'://'.$_SERVER['HTTP_HOST'].'/');
define('DIRETORIO_RAIZ', str_replace('\\', '/', __DIR__));

//CONSTANTES PROJETO


require_once DIRETORIO_RAIZ.'/system/AutoLoad.php';
new AutoLoad;
