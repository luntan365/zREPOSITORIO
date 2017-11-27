
  <div class="caixa">
  <span class="caixa-rotulo-contabancaria">Conta Bancária</span>

    <div class="caixa-item-form">
      <label>Banco</label>
      <select name="banco" class="campo">
        <?php foreach (CRUD::select('banco') as  $value): ?>
            <option value="<?php echo $value['id']; ?>"
            <?php SESSION::igual_entao2('cadastro_contabancaria', 'banco_id', $value['id'], 'selected'); ?> >
              <?php echo $value['descricao']; ?>
            </option>
        <?php endforeach; ?>
      </select>
    </div>

    <div class="caixa-item-form">
      <label>Agência</label>
      <input type="text" name="agencia" class="campo" maxlength="20"
      value="<?php SESSION::valor2('cadastro_contabancaria','agencia'); ?>" >
    </div>

    <div class="caixa-item-form">
      <label>Número da Conta</label>
      <input type="text" name="numero_conta" class="campo" maxlength="20"
      value="<?php SESSION::valor2('cadastro_contabancaria','numero_conta'); ?>" >
    </div>

    <div class="caixa-item-form">
      <label>Operação</label>
      <input type="text" name="operacao" class="campo" maxlength="3"
      value="<?php SESSION::valor2('cadastro_contabancaria','operacao'); ?>" >
    </div>

    <div class="caixa-item-form">
      <label>Observações</label>
      <input type="text" name="observacoes" class="campo" maxlength="500"
      value="<?php SESSION::valor2('cadastro_contabancaria','observacoes'); ?>" >
    </div>

  </div>
