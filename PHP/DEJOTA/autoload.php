<?php
  class AutoLoad {

    public function __construct(){
      $this->autocarrega(__DIR__);
    }

    private function autocarrega($diretorio){
      $caminhos = $this->listar_caminhos($diretorio);
      foreach ($caminhos as $caminho):
        require_once $caminho;
      endforeach;
    }

    private function listar_caminhos($diretorio, &$todos_caminho=[]) {
        $arquivos_ignorados = array(".", "..", "AutoLoad.php");
        $lista_arquivos_diretorios = scandir($diretorio);
        foreach($lista_arquivos_diretorios as $arquivo) {
            $caminho = $diretorio.'/'.$arquivo;
            if (!in_array($arquivo, $arquivos_ignorados)) {
                if (is_file($caminho) && is_readable($caminho)) {
                    $todos_caminho[] = $caminho;
                } elseif (is_dir($caminho) && is_readable($caminho)) {
                    $this->listar_caminhos($caminho, $todos_caminho);
                }
            }
        }
        return $todos_caminho;
    }


  }
