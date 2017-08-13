<?php

class Notificacao {

  public static function notificar_erro($erro){
    $_SESSION['notificacao_erro'][] = $erro;
  }

  public static function notificar_sucesso($sucesso){
    $_SESSION['notificacao_sucesso'][] = $sucesso;
  }

  public static function notificacoes() {

    if (!empty($_SESSION['notificacao_sucesso'])) {
      echo '<div class="notificacoes notificacao-sucesso">';
      foreach ($_SESSION['notificacao_sucesso'] as $value) {
        echo '<p>'.$value.'</p>';
      }
      echo'</div>';
      unset($_SESSION['notificacao_sucesso']);
    }

    if (!empty($_SESSION['notificacao_erro'])) {
      echo '<div class="notificacoes notificacao-erro">';
      foreach ($_SESSION['notificacao_erro'] as $value) {
        echo '<p>'.$value.'</p>';
      }
      echo'</div>';
      unset($_SESSION['notificacao_erro']);
    }

    
  }


}
