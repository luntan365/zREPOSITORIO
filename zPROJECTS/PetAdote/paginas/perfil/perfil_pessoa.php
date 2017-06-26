

<div class="alterar-pessoa">

    <form action="perfil/validar_pessoa" method="post" enctype="multipart/form-data">

      <div id="caixa-sexo" class="aterar-sexo">
        <label for="sexo">Sexo</label>
        <input type="radio" name="sexo" id="sexom" required="" value="masculino" <?php input_checked('sexo', 'masculino'); ?> ><label for="sexom">Masculino</label>
        <input type="radio" name="sexo" id="sexof" value="feminino" <?php input_checked('sexo', 'feminino'); ?>><label for="sexof">Feminino</label>
        <?php get_erro('erro_validacao_sexo'); ?>
      </div>

      <?php require_once('perfil_resto_formulario.php'); ?>
