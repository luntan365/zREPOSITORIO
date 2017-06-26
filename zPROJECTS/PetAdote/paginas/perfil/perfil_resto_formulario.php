
  <div class="">
      <label for="nome">Nome</label>
      <input type="text" name="nome" required="" value="<?php get_valor('nome'); ?>">
      <?php get_erro('erro_validacao_nome'); ?>
  </div>

  <div class="">
    <label for="estado">Estado</label>
    <select id="estado" name="estado" required="" value="<?php get_valor('estado'); ?>"></select>
    <?php get_erro('erro_validacao_estado'); ?>
  </div>

  <div class="">
      <label for="cidade">Cidade</label>
      <select id="cidade" name="cidade" required="" value="<?php get_valor('cidade'); ?>"></select>
      <?php get_erro('erro_validacao_cidade'); ?>
  </div>

  <div class="">
      <label for="telefone">Telefone</label>
      <input type="text" name="telefone" required="" value="<?php get_valor('telefone'); ?>">
      <?php get_erro('erro_validacao_telefone'); ?>
  </div>
  <br>
  <div class="">
  <input type="submit" value="Alterar Dados Pessoais">
  </div>

</form>
</div>

<script type="text/javascript" src="js/cidades-estados.js"></script>
