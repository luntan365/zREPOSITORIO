<?php

class Conexao {

  private static $conexao;

  public static function conectar() {
    if(!isset(self::$conexao)){
      try {
        try {
          self::$conexao = new PDO("mysql:dbname=".DATABASE."; host=".HOST."; charset=utf8", USER, PASS);
          self::$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
          self::$conexao = new PDO("mysql:dbname=".DATABASE_TESTE."; host=".HOST_TESTE."; charset=utf8", USER_TESTE, PASS_TESTE);
        }
      } catch (PDOException $e) {
        throw new Exception("CONEXAO: ".$e->getMessage());
        exit;
      }
    }
    return self::$conexao;
  }

}
