<?php
error_reporting(E_ALL);
date_default_timezone_set("America/Fortaleza");
header('Content-Type: text/html; charset=UTF-8');

define('DOMINIO',(!empty($_SERVER['HTTPS'])?'https':'http').'://'.$_SERVER['HTTP_HOST'].'/');

define('DIR_RAIZ', __DIR__);

require_once 'class/AutoLoad.class.php';

$crud = new CRUD;
