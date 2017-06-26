<?php
error_reporting(E_ALL); //site em desenvolvimento
// error_reporting(0); //site estiver no onlida

date_default_timezone_set("America/Sao_Paulo"); //define horario brazil
// date_default_timezone_set("America/Fortaleza"); //define horario brazil

define('DIRETORIO_RAIZ', str_replace('\config', '', __DIR__));
require_once DIRETORIO_RAIZ.'/class/AutoLoad.class.php';
