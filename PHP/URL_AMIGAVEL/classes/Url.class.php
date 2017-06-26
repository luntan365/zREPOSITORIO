<?php
class Url
{
    private static $urlrequere;
    private static $url;
    private static $baseUrl;

    public function __construct(){

      self::getURLList();

      if(!isset(self::$url[0]))
          self::$url[0] = "modulo1";

      if( file_exists("modulos/" . self::$url[0] . ".php"))
          self::$urlrequere = "modulos/" . self::$url[0] . ".php";
      else
          self::$urlrequere = "modulos/404.php";

    }
    public static function getURL($id){
        if(self::$url == null)
            self::getURLList();

        if(isset( self::$url[$id]))
            return self::$url[$id];

        return '';
    }

    public static function getBase(){
        if(isset(self::$baseUrl))
            return self::$baseUrl;
        $startUrl = strlen( $_SERVER["DOCUMENT_ROOT"] );
        $excludeUrl = substr( $_SERVER["SCRIPT_FILENAME"], $startUrl, -9 );
        if( $excludeUrl[0] == "/" )
            self::$baseUrl = $excludeUrl;
        else
            self::$baseUrl = "/" . $excludeUrl;
        return self::$baseUrl;
    }

    private static function getURLList() {
      if (isset($_GET['url'])) {
        self::$url = array_filter(explode("/", $_GET['url']));
      }
    }

    public function __toString(){
      return self::$urlrequere;
    }
}
