<?php
  class URL {

    private $url;
    private $varList = [];
    private $tipo;
    private $menu_ativo;

    public function __construct(){

      // pega todo texto apos o dominio do site e converte em array usando separador /
      if (!empty($_GET['urlroute'])) {
        $urlList = explode("/", $_GET['urlroute']);
      }

      //se nenhuma pagina foi especificada entao redireciona para home
      if(!isset($urlList[0])) { $urlList[0] = "home"; }

      // verificar se vai sar de um controle ou uma view
      // caso o href="__arquivo" comece com __ entrará na pasta controller
      // se não vai para pasta view
      if (preg_match('/^__/', $urlList[0])) {
        $urlList[0] = str_replace('__','', $urlList[0]);
        $dir = 'action';
        $this->tipo = 'action';
      } else {
        $dir = 'web/page';
        $this->tipo = 'web';
      }

      // pesquisa na pasta view ou controle o arquivo passado pela url
      // caso encontre, todo resto da url se torna variveis no array $varList
      // ao encontrar uma pasta, ele pesquisa se tem arquivo com mesmo da pasta no diretorio
      foreach ($urlList as $value) {
        $newdir = false;
        if (is_dir($dir.'/'.$value) || file_exists($dir.'/'.$value.'.php')):
          if (is_dir($dir.'/'.$value)):
            $dirtemp = $dir.'/'.$value;
            $newdir = true;
          endif;
          if(file_exists($dir.'/'.$value.'.php')):
            $arquivo = $value.'.php';
            $urltemp = $dir.'/'.$arquivo;
          endif;
          if(file_exists($dir.'/'.$value.'/'.$value.'.php')):
            $dir_arquivo = $dir.'/'.$value.'/'.$value.'.php';
          endif;
          if($newdir):
            $dir = $dirtemp;
          endif;
        else:
          $this->varList[] = $value;
        endif;
      }

      if (isset($arquivo)) {
        if(file_exists($dir.'/'.$arquivo)):
          $this->url = $dir.'/'.$arquivo;
        else:
          $this->url = $urltemp;
        endif;
      } else {
        if(isset($dir_arquivo)):
          $this->url = $dir_arquivo;
        else:
          $this->tipo = 'web';
          $dir = 'web/page';
          $this->url = $dir."/404.php";
        endif;
      }

    }
    // fim do construtor

    public function url() {
      return $this->url;
    }

    public function getVarList() {
      if (!empty($this->varList))
        return $this->varList;
      return $this->varList;
    }

    // public function getVar($id){
    //   if(isset($this->varList[$id]))
    //     return $this->varList[$id];
    //   return '';
    // }

    public function getVar() {
      if(!empty($this->varList))
        return $this->varList[0];
      return '';
    }

    public function tipo() {
      return $this->tipo;
    }

  }
