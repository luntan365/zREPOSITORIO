<?php
session_start();
error_reporting(E_ALL); // 0 para nao reportasr nenhum erro
date_default_timezone_set("America/Fortaleza");
mb_internal_encoding('UTF-8');
mb_http_output('UTF-8');

//DATABASE
define('HOST', 'localhost');
define('DATABASE', 'construtec_imoveis');
define('USER', 'root');
define('PASS', 'usbw');

//DATABASE TESTE
define('HOST_TESTE', 'localhost');
define('DATABASE_TESTE', 'construtec_imoveis');
define('USER_TESTE', 'root');
define('PASS_TESTE', 'usbw');

//VARIAVEIS DE ACESSO GLOBAL
define('DOMINIO',(!empty($_SERVER['HTTPS'])?'https':'http').'://'.$_SERVER['HTTP_HOST'].'/');
define('DIRETORIO_RAIZ', str_replace('\\', '/', __DIR__));

require_once DIRETORIO_RAIZ.'/URL.php';
require_once DIRETORIO_RAIZ.'/zphp/Conexao.php';
require_once DIRETORIO_RAIZ.'/zphp/CRUD.php';
require_once DIRETORIO_RAIZ.'/zphp/Notificacao.php';

$url = new URL();
if ($url->acao()) { include_once $url->acao(); }

function permissao_logado() {
  if (empty($_SESSION['usuario'])) {
    header("Location: ".DOMINIO.'acesso');
    exit;
  }
}
