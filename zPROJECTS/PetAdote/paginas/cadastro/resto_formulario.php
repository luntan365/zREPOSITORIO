
  <div class="">
      <label for="nome">Nome</label>
      <input type="text" name="nome" required="" value="<?php get_valor('salvo_valida_nome'); ?>">
      <?php get_erro('erro_validacao_nome'); ?>
  </div>

  <div class="">
      <label for="telefone">Telefone</label>
      <input id="telefone" type="text" required="" name="telefone" value="<?php get_valor('salvo_valida_telefone'); ?>">
      <?php get_erro('erro_validacao_telefone'); ?>
  </div>

  <div class="">
    <label for="estado">Estado</label>
    <select id="estado" name="estado" required="" value="<?php get_valor('salvo_valida_estado'); ?>"></select>
    <?php get_erro('erro_validacao_estado'); ?>
  </div>

  <div class="">
      <label for="cidade">Cidade</label>
      <select id="cidade" name="cidade" required="" value="<?php get_valor('salvo_valida_cidade'); ?>"></select>
      <?php get_erro('erro_validacao_cidade'); ?>
  </div>

  <div class="">
      <label for="email">E-mail</label>
      <input type="text" name="email" required="" value="<?php get_valor('salvo_valida_email'); ?>">
      <?php get_erro('erro_validacao_email'); ?>
  </div>

  <div class="">
      <label for="emailcomfirma">Confirmar E-mail</label>
      <input type="text" name="emailcomfirma" required="" value="<?php get_valor('salvo_valida_emailcomfirma'); ?>">
      <?php get_erro('erro_validacao_emailcomfirma'); ?>
  </div>

  <div class="">
      <label for="password">Senha</label>
      <input type="password" name="senha" required="">
      <?php get_erro('erro_validacao_senha'); ?>
  </div>

  <div class="">
      <label for="senhaconfirme">Confirmar Senha</label>
      <input type="password" name="senhaconfirme" required="">
      <?php get_erro('erro_validacao_senhaconfirme'); ?>
  </div>


  <div class="">
    <label for="foto">Foto</label>
      <input type="file" name="foto" required="" id="carrega" value="Carrega">
      <?php get_erro('erro_validacao_foto'); ?>
  </div>


  <div class="cadastro-inline">
      <input type="checkbox" name="aceito" required="" value="aceito">
      <span>Eu aceito os <a href="termodeuso" target="_blank">termos de uso do PetAdote</a></span>
      <?php get_erro('erro_validacao_termouso'); ?>
  </div>

  <input type="hidden" name="csrf_valida" value="<?php echo $_SESSION['CSRF']; ?>">

  <div class="">
  <input id="cadastra" type="submit" value="Cadastra">
  </div>

</form>
</div>

<script type="text/javascript" src="js/cidades-estados.js"></script>
