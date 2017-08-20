<?php if ($_SERVER['REQUEST_METHOD']=='POST'):

$_SESSION['pesquisa'] = [];

if (isset($_POST['casa'])) {  $_SESSION['pesquisa']['casa'] = 'casa'; }    
if (isset($_POST['ap'])) {  $_SESSION['pesquisa']['ap'] = 'ap'; } 
if (isset($_POST['comercial'])) {  $_SESSION['pesquisa']['comercial'] = 'comercial'; }

if (isset($_POST['quintal'])) {  $_SESSION['pesquisa']['quintal'] = 'quintal'; }
if (isset($_POST['varanda'])) {  $_SESSION['pesquisa']['varanda'] = 'varanda'; }

$quarto_suite = trim($_POST['quarto_suite']);
if (!empty($quarto_suite)) {  $_SESSION['pesquisa']['quarto_suite'] = $quarto_suite; }
$suite = trim($_POST['suite']);
if (!empty($suite)) {  $_SESSION['pesquisa']['suite'] = $suite; }
$banheiro = trim($_POST['banheiro']);
if (!empty($banheiro)) {  $_SESSION['pesquisa']['banheiro'] = $banheiro; }
$garagem = trim($_POST['garagem']);
if (!empty($garagem)) {  $_SESSION['pesquisa']['garagem'] = $garagem; }


endif; ?>
