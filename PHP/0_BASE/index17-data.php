<?php
//definindo fuso horario
date_default_timezone_set('America/Fortaleza');
//data e hora
echo date("d/m/y H:i:s") . "<br>";
//manipujando datas
$dia = date("d");
$mes = date("m");
$ano = date("y");
echo "$dia/$mes/$ano";
echo "<br>";
//hora
$hora = date("H");
$minuto = date("i");
$segundo = date("s");
echo "$hora:$minuto:$segundo";
echo "<br>";
