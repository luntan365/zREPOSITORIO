<?php

  $super_entidade = SESSION::ss('cadastro_superentidade');
  if (SuperEntidadeDAO::salvar($super_entidade)) {
    Notificacao::notificar_sucesso('Cadastro concluido com sucesso.');
    $id = $super_entidade->entidade()->id();
    unset($_SESSION['cadastro_superentidade']);
    unset($_SESSION['cadastro_contabancaria']);
    unset($_SESSION['cadastro_contato']);
    unset($_SESSION['cadastro_endereco']);
    unset($_SESSION['cadastro_endereco_estado']);
    unset($_SESSION['cadastro_endereco_pais']);
    header("Location: ".DOMINIO.'__ativarentidade/ativar/'.$id);
  } else {
    header("Location: ".DOMINIO."cadastro/cadastro3");
    exit;
  }
