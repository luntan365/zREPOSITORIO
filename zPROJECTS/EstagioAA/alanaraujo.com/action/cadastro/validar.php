<?php
if (!$_SERVER['REQUEST_METHOD']=='POST') {  header("Location: ".DOMINIO); exit; }

  if (SESSION::ss('cadastro_superentidade')) {
    $super_entidade = SESSION::ss('cadastro_superentidade');
  } else {
    $super_entidade = new SuperEntidade();
  }


  $entidade = new Entidade();
  $entidade->pessoa($_POST['pessoa']);
  $entidade->nome($_POST['nome']);
  $entidade->observacoes($_POST['observacoes']);

  if ($entidade->pessoa() == 'fisica') {
    $pessoa = new PessoaFisica();
    $pessoa->cpf($_POST['cpf']);
    $pessoa->rg($_POST['rg']);
    $pessoa->data_nascimento($_POST['data_nascimento']);

  } elseif ($entidade->pessoa() == 'juridica') {
    $pessoa = new PessoaJuridica();
    $pessoa->cnpj($_POST['cnpj']);
    $pessoa->razao_social($_POST['razao_social']);
    $pessoa->fistel($_POST['fistel']);
    $pessoa->numero_entidade($_POST['numero_entidade']);
    $pessoa->inscricao_estadual($_POST['inscricao_estadual']);
    $pessoa->inscricao_municipal($_POST['inscricao_municipal']);
  }


  // CATEGORIAS
  $list_categorias = [];
  foreach ($_POST as $key => $id) {
    if (substr_count($key, 'categoria_id_') > 0) {
      $list_categorias[$id] = new CategoriaEntidade(['categoria_id'=>$id]);
    }
  }

  $validar_entidade = EntidadeVLD::validar($entidade);
  $validar_pessoa = PessoaVLD::validar($pessoa);

  $super_entidade->entidade($entidade);
  if ($validar_pessoa !== null) {  $super_entidade->pessoa($pessoa);  }
  $super_entidade->categoria($list_categorias);

  SESSION::ss('cadastro_superentidade', $super_entidade);

if ($validar_entidade && $validar_pessoa!==false) {
  header("Location: ".DOMINIO."cadastro/cadastro2");
  exit;
} else {
  header("Location: ".DOMINIO."cadastro");
  exit;
}
