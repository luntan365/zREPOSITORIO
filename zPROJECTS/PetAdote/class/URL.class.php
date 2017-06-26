<?php
  class URL {

    private $url;
    private $varList;

    public function __construct($dir){

      if (isset($_GET['url']))
        $urlList = array_filter(explode("/", $_GET['url']));

      if(!isset($urlList[0]))
          $urlList[0] = "home";

      $diretorio = $dir;
      foreach ($urlList as $value):
        $newdir = false;
        if (is_dir($diretorio.'/'.$value) || file_exists($diretorio.'/'.$value.'.php')):
          if (is_dir($diretorio.'/'.$value)):
            $dirtemp = $diretorio.'/'.$value;
            $newdir = true;
          endif;
          if(file_exists($diretorio.'/'.$value.'.php')):
            $arquivo = $value.'.php';
            $urltemp = $diretorio.'/'.$arquivo;
          endif;
          if(file_exists($diretorio.'/'.$value.'/'.$value.'.php')):
            $diretorio_arquivo = $diretorio.'/'.$value.'/'.$value.'.php';
          endif;
          if($newdir):
            $diretorio = $dirtemp;
          endif;
        else:
          $this->varList[] = $value;
        endif;
      endforeach;

      if (isset($arquivo)):
        if(file_exists($diretorio.'/'.$arquivo)):
          $this->url = $diretorio.'/'.$arquivo;
        else:
          $this->url = $urltemp;
        endif;
      else:
        if(isset($diretorio_arquivo)):
          $this->url = $diretorio_arquivo;
        else:
          $this->url = $dir."/404.php";
        endif;
      endif;

    }


    public function getVarList() {
      if (isset($this->varList))
        return $this->varList;
      return array();
    }

    public function getVar($id){
      if(isset($this->varList[$id]))
        return $this->varList[$id];
      return '';
    }

    public function __toString(){
      return $this->url;
    }


  }
