<?php

if (!$_SERVER['REQUEST_METHOD']=='POST') {  header("Location: ".DOMINIO); }

  if ($_POST['csrf_valida'] != $_SESSION['CSRF']) {
    die("ocorreu algum erro, feche o navegador de internet e abra novamente");
  }

  $validado_ok = true;

  //===================================================================\\
  if (isset($_POST['cnpj'])):
    try {
      $cnpj = Valida::cnpj($_POST['cnpj']);
    } catch (Exception $e) {
      $_SESSION['erro_validacao_cnpj'] = $e->getMessage();
      $validado_ok = false;
    }
  endif;
  //===================================================================\\
  if (isset($_POST['endereco'])):
    try {
      $endereco = Valida::texto($_POST['endereco'], 255);
    } catch (Exception $e) {
      $_SESSION['erro_validacao_endereco'] = $e->getMessage();
      $validado_ok = false;
    }
  endif;

  //===================================================================\\
  if (isset($_POST['nome'])):
    try {
      $nome = Valida::texto($_POST['nome']);
    } catch (Exception $e) {
      $_SESSION['erro_validacao_nome'] = $e->getMessage();
      $validado_ok = false;
    }
  endif;
  //===================================================================\\
  if (isset($_POST['estado'])):
    try {
      $estado = Valida::texto($_POST['estado'], 2);
    } catch (Exception $e) {
      $_SESSION['erro_validacao_estado'] = $e->getMessage();
      $validado_ok = false;
    }
  endif;
  //===================================================================\\
  if (isset($_POST['cidade'])):
    try {
      $cidade = Valida::texto($_POST['cidade'], 100);
    } catch (Exception $e) {
      $_SESSION['erro_validacao_cidade'] = $e->getMessage();
      $validado_ok = false;
    }
  endif;
  //===================================================================\\
  if (isset($_POST['telefone'])):
    try {
      $telefone = Valida::telefone($_POST['telefone']);
    } catch (Exception $e) {
      $_SESSION['erro_validacao_telefone'] = $e->getMessage();
      $validado_ok = false;
    }
  endif;
  //===================================================================\\
  if (isset($_POST['email'])):
    try {
      $email = Valida::email($_POST['email']);
      if (!empty($crud->select_email_existe($email))):
        $_SESSION['erro_validacao_email'] = "E-mail já está cadastrado.";
        $validado_ok = false;
      endif;
    } catch (Exception $e) {
      $_SESSION['erro_validacao_email'] = $e->getMessage();
      $validado_ok = false;
    }
  endif;
  //===================================================================\\
  if (isset($_POST['emailcomfirma'])):
    try {
      if (isset($email)) {
        if ($_POST['emailcomfirma'] != $email):
          $_SESSION['erro_validacao_emailcomfirma'] = "E-mails estão diferente.";
          $validado_ok = false;
        endif;
      }
    } catch (Exception $e) {
      $_SESSION['erro_validacao_emailcomfirma'] = $e->getMessage();
      $validado_ok = false;
    }
  endif;
  //===================================================================\\
  if (isset($_POST['senha'])):
    try {
      $senha = Valida::texto($_POST['senha'], 32, 4);
    } catch (Exception $e) {
      $_SESSION['erro_validacao_senha'] = $e->getMessage();
      $validado_ok = false;
    }
  endif;
  //===================================================================\\
  if (isset($_POST['senhaconfirme'])):
    try {
      if (isset($senha)) {
        if ($_POST['senhaconfirme'] != $senha):
          $_SESSION['erro_validacao_senhaconfirme'] = "As senhas estão diferente.";
          $validado_ok = false;
        endif;
      }
    } catch (Exception $e) {
      $_SESSION['erro_validacao_senhaconfirme'] = $e->getMessage();
      $validado_ok = false;
    }
  endif;
  //===================================================================\\
  if (!isset($_POST['aceito'])):
    $_SESSION['erro_validacao_termouso'] = "Aceite os termos de uso.";
    $validado_ok = false;
  endif;

  //===================================================================\\
    if ($validado_ok) {
      try {
        $foto = new UploadImagem('foto','img/usuariosfotos', 200, 200);
      } catch (Exception $e) {
        $_SESSION['erro_validacao_foto'] = $e->getMessage();
        $validado_ok = false;
      }
    }
  //===================================================================\\


  if ($validado_ok):
    try {
      $crud->insert_usuario_instituicao($cnpj, $endereco, $nome, $email, $estado, $cidade, $telefone, $foto, $senha);
      $_SESSION['CSRF'] = isset($_SESSION['CSRF']) ? $_SESSION['CSRF'] : hash('sha512', rand(100,1000));
      header("Location: ".DOMINIO."login");

    } catch (Exception $e) {
      unlink(str_replace('\\', '/', DIR_RAIZ).'/'.$foto);

      if (isset($cnpj)): $_SESSION['salvo_valida_cnpj'] = $cnpj; endif;
      if (isset($endereco)): $_SESSION['salvo_valida_endereco'] = $endereco; endif;
      if (isset($nome)): $_SESSION['salvo_valida_nome'] = $nome; endif;
      if (isset($email)): $_SESSION['salvo_valida_email'] = $email; endif;
      if (isset($emailcomfirma)): $_SESSION['salvo_valida_emailcomfirma'] = $emailcomfirma; endif;
      if (isset($estado)): $_SESSION['salvo_valida_estado'] = $estado; endif;
      if (isset($cidade)): $_SESSION['salvo_valida_cidade'] = $cidade; endif;
      if (isset($telefone)): $_SESSION['salvo_valida_telefone'] = $telefone; endif;
      header("Location: ".DOMINIO."cadastro/instituicao");
    }

  else:
    if (isset($cnpj)): $_SESSION['salvo_valida_cnpj'] = $cnpj; endif;
    if (isset($endereco)): $_SESSION['salvo_valida_endereco'] = $endereco; endif;
    if (isset($nome)): $_SESSION['salvo_valida_nome'] = $nome; endif;
    if (isset($email)): $_SESSION['salvo_valida_email'] = $email; endif;
    if (isset($emailcomfirma)): $_SESSION['salvo_valida_emailcomfirma'] = $emailcomfirma; endif;
    if (isset($estado)): $_SESSION['salvo_valida_estado'] = $estado; endif;
    if (isset($cidade)): $_SESSION['salvo_valida_cidade'] = $cidade; endif;
    if (isset($telefone)): $_SESSION['salvo_valida_telefone'] = $telefone; endif;
    header("Location: ".DOMINIO."cadastro/instituicao");
  endif;
