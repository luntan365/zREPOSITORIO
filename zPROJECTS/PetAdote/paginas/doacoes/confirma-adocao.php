<?php
if (!isset($_SESSION['usuario']['id'])) { header("Location: ".DOMINIO); }
$idpet = $urlamigavel->getVar(0);
$idadotante = $urlamigavel->getVar(1);


if (!empty($crud->select_verificar_meu_pet($idpet, $_SESSION['usuario']['id'])) && !empty($crud->select_verificar_esta_lista_adocao($idpet, $idadotante))):
  try {
    $crud->update_adocao_confirmada($idpet, $idadotante);
    ?>
      <p>Adoção confirmada com sucesso</p>
      <a href="doacoes">Voltar para lista de adotantes</a>
    <?php
  } catch (Exception $e) {
    ?>
      <p>Ocorreu um erro na confirmação da adoção</p>
      <a href="doacoes">Voltar para lista de adotantes</a>
    <?php
  }
else: ?>
  <h1>Você não tem permissão para efetuar essa adoção</h1>
  <a href="doacoes">Voltar para lista de adotantes</a>
<?php endif; ?>
