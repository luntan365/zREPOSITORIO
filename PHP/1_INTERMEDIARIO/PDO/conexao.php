<?php

function conectar(){
  try {
    $pdo = new PDO("mysql:host=localhost;dbname=agenda", "root", "usbw");
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
  return $pdo;
}
  
 

