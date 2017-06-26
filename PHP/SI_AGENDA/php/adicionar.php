<script type="text/javascript" src="js/pais.js"></script>
<body onload="carregarItensSelect();">

  <form id="cadastro" name="form_cad" action="?operacao=cadastrar"
  method="POST" enctype="multipart/form-data">

    <fieldset>
      <legend>Cadastro de Contatos</legend>

      <div>
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" placeholder="Insira seu nome"
        class="config" title="Seu Nome">
      </div>

      <div>
        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" placeholder="Insira seu e-mail"
        class="config" title="Seu E-mail">
      </div>

      <div>
        <label for="sexo">Sexo:</label>
        <input type="radio" id="m" name="sexo" title="Seu Sexo" value="M"/>
        <label for="m">Masculino</label>
        <input type="radio" id="f" name="sexo" title="Seu Sexo" value="F"/>
        <label for="f">Feminino</label>
      </div>

      <div>
        <label for="nascimento">Data de Nascimento:</label>
        <input type="text" id="data" name="nascimento"
        title="Sua Data de nascimento" required>
      </div>

      <div>
        <label for="telefone">Telefone:</label>
        <input type="text" id="celular" name="telefone"
        placeholder="Insira seu Telefone" title="Seu Telefone">
      </div>

      <div>
        <label for="pais">País:</label>
        <select id="pais" name="pais">
        </select>
      </div>

      <div>
        <label for="imagem">Foto:</label>
        <input type="file" name="imagem" title="Insira Sua Foto">
      </div>

      <div>
        <input type="submit" id="enviar" name="enviar" value="Enviar">
      </div>

    </fieldset>

  </form>

</body>
<script type="text/javascript" src="js/validadores/notificacao.js"></script>
<script type="text/javascript" src="js/validadores/data.js"></script>
<script type="text/javascript" src="js/validadores/celular.js"></script>

<?php header("location: index.php"); ?>
