<?php
if (!isset($_SESSION['qnt_pes_pet'])) { $_SESSION['qnt_pes_pet'] = 1; }

if ($urlamigavel->getVar(0)=='avancar') {
  $_SESSION['qnt_pes_pet'] += 1;
} elseif ($urlamigavel->getVar(0)=='voltar') {
  $_SESSION['qnt_pes_pet'] -= 1;
  if ($_SESSION['qnt_pes_pet'] < 1) { $_SESSION['qnt_pes_pet'] = 1; }
} elseif ($urlamigavel->getVar(0)=='inicio') {
   $_SESSION['qnt_pes_pet'] = 1;
}

header("Location: ".DOMINIO."pets/pesquisa");
