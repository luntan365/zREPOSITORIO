<?php
  class UrlAmigavel {

    private $url_amigavel;

    function __construct() {
      $sqs = explode('/',isset($_SERVER['REDIRECT_QUERY_STRING']) ? $_SERVER['REDIRECT_QUERY_STRING'] : null);
      if($sqs[0]):
        if(file_exists($sqs[0].'.php')):
          $this->url_amigavel = $sqs[0].'.php';
        else:
          $this->url_amigavel = '404.php';
        endif;
      else:
        $this->url_amigavel = 'home.php';
      endif;
    }

    public function __toString() {
      return $this->url_amigavel;
    }

  }
