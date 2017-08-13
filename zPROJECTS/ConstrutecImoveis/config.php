<?php
session_start();
error_reporting(E_ALL); // 0 para nao reportasr nenhum erro
date_default_timezone_set("America/Fortaleza");
mb_internal_encoding('UTF-8');
mb_http_output('UTF-8');

//DATABASE ACCESSS
define('HOST', 'localhost');
define('DATABASE', 'construtec_imoveis');
define('USER', 'root');
define('PASS', 'usbw');

//VARIAVEIS DE ACESSO GLOBAL
define('DOMINIO',(!empty($_SERVER['HTTPS'])?'https':'http').'://'.$_SERVER['HTTP_HOST'].'/');
define('DIRETORIO_RAIZ', str_replace('\\', '/', __DIR__));

require_once DIRETORIO_RAIZ.'/zphp/URL.php';
$url = new URL();
if ($url->acao()) { include_once $url->acao(); }
