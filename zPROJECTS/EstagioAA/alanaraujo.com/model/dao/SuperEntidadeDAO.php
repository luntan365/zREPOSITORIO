<?php
class SuperEntidadeDAO {

  public static function salvar(SuperEntidade &$x) {
    //referecia dos atributos da entidade, pois da erro chamar get dentro do parametro de outros metodo com validar() e salvar().
    $entidade = $x->entidade();
    $pessoa = $x->pessoa();
    $categoria = $x->categoria();
    $endereco = $x->endereco();
    $conta_bancaria = $x->conta_bancaria();
    $contato = $x->contato();

    //array para guardar todas as validaçoes
    $validacoes = [];
    //validando entidade
    $validacoes[] = EntidadeVLD::validar($entidade);
    //validado pessoa fisisca ou juridica somente se existir
    if ($pessoa != null) { $validacoes[] = PessoaVLD::validar($pessoa); }
    //validando as Listas dos outros atributos
    foreach ($endereco as $entity) {  $validacoes[] = EnderecoVLD::validar($entity);  }
    foreach ($conta_bancaria as $entity) {  $validacoes[] = ContaBancariaVLD::validar($entity);  }
    foreach ($contato as $entity) {  $validacoes[] = ContatoVLD::validar($entity);  }

    //se alguma das validaçoes for falsa, saia e nao salve nada no banco
    if (in_array(false, $validacoes, true)) { return false; }

    try {
      // pegando referencia da conexao
      $con = Conexao::conectar();
      // iniciando transação, para se algo der errado nao salve nada no banco
      $con->beginTransaction();
      //salvando a entidade
      DAO::salvar($entidade);
      //salvando somente se existir pesssoa
      if ($pessoa != null) {
        $pessoa->entidade_id($entidade->id());
        DAO::salvar($pessoa);
      }
      // salvando as lista de atributos
      foreach ($categoria as $entity) {
        $entity->entidade_id($entidade->id());
        DAO::salvar($entity);
      }
      foreach ($endereco as $entity) {
        $entity->entidade_id($entidade->id());
        DAO::salvar($entity);
      }
      foreach ($conta_bancaria as $entity) {
        $entity->entidade_id($entidade->id());
        DAO::salvar($entity);
      }
      foreach ($contato as $entity) {
        $entity->entidade_id($entidade->id());
        DAO::salvar($entity);
      }
      // comfirmando o registro no banco de dados
      $con->commit();
      return true;
    } catch (Exception $e) {
      // se algo der errado desfazer tudo que foi salvo
      $con->rollBack();
      // notificando erro
      Notificacao::notificar_erro("Erro ao salvar a SuperEntidade ".$e->getMessage());
    }
  }

  public static function alterar(SuperEntidade &$x) {
    //referecia dos atributos da entidade, pois da erro chamar get dentro do parametro de outros metodo com validar() e salvar().

    $entidade = $x->entidade();
    $pessoa = $x->pessoa();
    $categoria = $x->categoria();
    $endereco = $x->endereco();
    $conta_bancaria = $x->conta_bancaria();
    $contato = $x->contato();

    //array para guardar todas as validaçoes
    $validacoes = [];
    //validando entidade
    $validacoes[] = EntidadeVLD::validar($entidade);
    //validado pessoa fisisca ou juridica somente se existir
    if ($pessoa != null) {
      //setando logo id para verificar se existe cpf ou cnpj igual e nao pertence a mim
      $pessoa->entidade_id($entidade->id());
      $validacoes[] = PessoaVLD::validar($pessoa);
    }
    //validando as Listas dos outros atributos
    foreach ($endereco as $entity) {  $validacoes[] = EnderecoVLD::validar($entity);  }
    foreach ($conta_bancaria as $entity) {  $validacoes[] = ContaBancariaVLD::validar($entity);  }
    foreach ($contato as $entity) {  $validacoes[] = ContatoVLD::validar($entity);  }

    //se alguma das validaçoes for falsa, saia e nao salve nada no banco
    if (in_array(false, $validacoes, true)) { return false; }

    try {
      // pegando referencia da conexao
      $con = Conexao::conectar();
      // iniciando transação, para se algo der errado nao salve nada no banco
      $con->beginTransaction();
      //salvando a entidade
      DAO::alterar($entidade);

      //salvando alteraçoes somente se existir pesssoa
      if ($pessoa != null) {
        $entidade_id = $entidade->id();
        if ($x->entidade()->pessoa()=='fisica') {
          $pessoatemp = new PessoaFisica(['entidade_id'=>$entidade_id]);
          DAO::buscar($pessoatemp);
          if ($pessoatemp != null) {
            DAO::alterar($pessoa);
          } else {
            $pessoa->entidade_id($entidade->id());
            DAO::salvar($pessoa);
          }
          $pessoatemp = new PessoaJuridica(['entidade_id'=>$entidade_id]);
          DAO::buscar($pessoatemp);
          if ($pessoatemp != null) { DAO::excluir($pessoatemp); }

        } elseif ($x->entidade()->pessoa()=='juridica'){
          $pessoatemp = new PessoaJuridica(['entidade_id'=>$entidade_id]);
          DAO::buscar($pessoatemp);
          if ($pessoatemp != null) {
            DAO::alterar($pessoa);
          } else {
              DAO::salvar($pessoa);
          }
          $pessoatemp = new PessoaFisica(['entidade_id'=>$entidade_id]);
          DAO::buscar($pessoatemp);
          if ($pessoatemp != null) { DAO::excluir($pessoatemp); }
        }
      }

      // pagando todas categorias e salvando todas as novas cateogiras
      CRUD::delete('categoria_entidade', 'entidade_id = ?', $x->entidade()->id());
      foreach ($categoria as $entity) {  $entity->entidade_id($entidade->id()); DAO::salvar($entity);  }

      //altera endereços que ja possuem e deleta os que nao estao na lista de endereços
      $ends = CRUD::select('endereco', 'id', 'entidade_id = ?', $x->entidade()->id());
      $ends_ids = [];
      foreach ($ends as $value) { $ends_ids[$value['id']] = $value['id']; }
      foreach ($endereco as $entity) {
        if ($entity->id() != null) {
          if (in_array($entity->id(), $ends_ids)) {
            DAO::alterar($entity);
            unset($ends_ids[$entity->id()]);
          } else { $entity->entidade_id($entidade->id());  DAO::salvar($entity); }
        } else { $entity->entidade_id($entidade->id()); DAO::salvar($entity);  }
      }
      foreach ($ends_ids as $id) {
        $new_end = new Endereco(['id'=>$id]);
        DAO::excluir($new_end);
      }

      //altera contas bancarias q existem e apaga as quem nao estao definida
      $cbs = CRUD::select('conta_bancaria', 'id', 'entidade_id = ?', $x->entidade()->id());
      $cbs_ids = [];
      foreach ($cbs as $value) { $cbs_ids[$value['id']] = $value['id']; }
      foreach ($conta_bancaria as $entity) {
        if ($entity->id() != null) {
          if (in_array($entity->id(), $cbs_ids)) {
            DAO::alterar($entity);
            unset($cbs_ids[$entity->id()]);
          } else { $entity->entidade_id($entidade->id());  DAO::salvar($entity);  }
        } else { $entity->entidade_id($entidade->id());  DAO::salvar($entity);   }
      }
      foreach ($cbs_ids as $id) {
        $new_cb = new ContaBancaria(['id'=>$id]);
        DAO::excluir($new_cb);
      }


      //alterando contatos existentes e apagando as quem nao estao definidas
      $ctt = CRUD::select('contato', 'id', 'entidade_id = ?', $x->entidade()->id());
      $ctts_ids = [];
      foreach ($ctt as $value) { $ctts_ids[$value['id']] = $value['id']; }
      foreach ($contato as $entity) {
        if ($entity->id() != null) {
          if (in_array($entity->id(), $ctts_ids)) {
            DAO::alterar($entity);
            unset($ctts_ids[$entity->id()]);
          } else { $entity->entidade_id($entidade->id());  DAO::salvar($entity);  }
        } else { $entity->entidade_id($entidade->id());  DAO::salvar($entity);   }
      }
      foreach ($ctts_ids as $id) {
        $new_ctt = new Contato(['id'=>$id]);
        DAO::excluir($new_ctt);
      }

      // comfirmando o registro no banco de dados
      $con->commit();
      return true;
    } catch (Exception $e) {
      // se algo der errado desfazer tudo que foi salvo
      $con->rollBack();
      // notificando erro
      Notificacao::notificar_erro("Erro ao alterar a SuperEntidade ".$e->getMessage());
      return false;
    }
  }

  public static function excluir($id) {
    try {
      $con = Conexao::conectar();
      $con->beginTransaction();
      CRUD::delete('pessoa_fisica', 'entidade_id = ?', $id);
      CRUD::delete('pessoa_juridica', 'entidade_id = ?', $id);
      CRUD::delete('categoria_entidade', 'entidade_id = ?', $id);
      CRUD::delete('endereco', 'entidade_id = ?', $id);
      CRUD::delete('conta_bancaria', 'entidade_id = ?', $id);
      CRUD::delete('contato', 'entidade_id = ?', $id);
      CRUD::delete('entidade', 'id = ?', $id);
      $con->commit();
      return true;
    } catch (Exception $e) {
      $con->rollBack();
      Notificacao::notificar_erro("Erro ao excluir a SuperEntidade ".$e->getMessage());
      return false;
    }
  }

  public static function buscar($id) {
    $se = new SuperEntidade();

    $e = new Entidade(['id'=>$id]);
    DAO::buscar($e);
    if ($e===null) { return null; }
    $se->entidade($e);

    if ($e->pessoa()=='fisica') {
      $pf = new PessoaFisica(['entidade_id'=>$id]);
      DAO::buscar($pf);
      if ($e!=null) { $se->pessoa($pf); }
    } elseif ($e->pessoa()=='juridica') {
      $pj = new PessoaJuridica(['entidade_id'=>$id]);
      DAO::buscar($pj);
      if ($e!=null) { $se->pessoa($pj); }
    }

    $ctgs = CRUD::select('categoria_entidade', '*', 'entidade_id = ?', $id);
    foreach ($ctgs as $dados) { $se->categoria_adicionar(new CategoriaEntidade($dados)); }
    $ends = CRUD::select('endereco', '*', 'entidade_id = ?', $id);
    foreach ($ends as $dados) { $se->endereco_adicionar(new Endereco($dados));  }
    $cbs = CRUD::select('conta_bancaria', '*', 'entidade_id = ?', $id);
    foreach ($cbs as $dados) { $se->conta_bancaria_adicionar(new ContaBancaria($dados));  }
    $ctts = CRUD::select('contato', '*', 'entidade_id = ?', $id);
    foreach ($ctts as $dados) { $se->contato_adicionar(new Contato($dados));  }

    return $se;
  }



}
