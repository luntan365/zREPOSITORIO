<?php
class DAO {
  
  // call_user_func(get_class($x).'VLD::validar', $x)
  // invaca a funcao validar da classe: entidadeVLD::validar($x)
  
  public static function salvar(Entity &$x) {
    if (call_user_func(get_class($x).'VLD::validar', $x)) {
      ORM::salvar($x);
    }
  }
  
  public static function alterar(Entity &$x) {
    if (call_user_func(get_class($x).'VLD::validar', $x)) {
      ORM::alterar($x);
    }
  }
  
  public static function excluir(Entity &$x) {
    ORM::excluir($x);
  }
  
  public static function buscar(Entity &$x) {
    ORM::buscar($x);
  }
  
}
