<?php
  class URL {

    private static $url;
    private static $varList;

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
          self::$varList[] = $value;
        endif;
      endforeach;

      if (isset($arquivo)):
        if(file_exists($diretorio.'/'.$arquivo)):
          self::$url = $diretorio.'/'.$arquivo;
        else:
          self::$url = $urltemp;
        endif;
      else:
        if(isset($diretorio_arquivo)):
          self::$url = $diretorio_arquivo;
        else:
          self::$url = $dir."/404.php";
        endif;
      endif;

    }


    public static function getVarList() {
      if (isset(self::$varList))
        return self::$varList;
      return array();
    }

    public static function getVar($id){
      if(isset(self::$varList[$id]))
        return self::$varList[$id];
      return '';
    }

    public function __toString(){
      return self::$url;
    }


  }
