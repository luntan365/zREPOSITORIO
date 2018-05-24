<?php
  protected function lembrar($senha)  {

      setcookie('usuario', $_SESSION["usuario"], (time() + (15 * 24 * 3600)),$_SERVER['SERVER_NAME']);
      setcookie('senha', $_SESSION["senha"], (time() + (15 * 24 * 3600)),$_SERVER['SERVER_NAME']);
  }
    public function auto_login()    {
      if (!empty($_COOKIE['usuario'] and !empty($_COOKIE['senha']):
        $usuario = $_COOKIE['usuario'];
        $senha = md5($_COOKIE['senha']);
        // pesquisa banco de dados se existe usuario
        // se sim, efetua o login
        else{
          // vai pra pagina de login
          // e faz login normal
        endif;
    }
}
