<?php
namespace drawrok;

class AutoLoad {

  private $arquivos_ignorados = array("AutoLoad.php", "index.php");

  public function __construct(){
    spl_autoload_register($this->autocarrega(__DIR__));
  }

  private function autocarrega($diretorio){
    $caminhos = $this->listar_caminhos($diretorio);
    var_dump($caminhos);
    foreach ($caminhos as $caminho):
      include_once $caminho;
    endforeach;
  }

  private function listar_caminhos($diretorio, &$todos_caminho=[]) {

      $lista_arquivos_diretorios = scandir($diretorio);
      foreach($lista_arquivos_diretorios as $arquivo) {
        if (!preg_match('/^\./', $arquivo)) {
          $diretorio = str_replace('\\', '/' , $diretorio);
          $caminho = $diretorio.'/'.$arquivo;
          if (!in_array($arquivo, $this->arquivos_ignorados)) {
              if (is_file($caminho) && is_readable($caminho) && preg_match('/\.php$/', $arquivo)) {
                  $todos_caminho[] = $caminho;
              } elseif (is_dir($caminho) && is_readable($caminho)) {
                  $this->listar_caminhos($caminho, $todos_caminho);
              }
          }
        }

      }
      return $todos_caminho;
  }


}
