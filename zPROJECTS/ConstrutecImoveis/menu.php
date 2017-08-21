<div class="col s3">
  
  <form class="container" action="pesquisar" method="post" autocomplete="off" enctype="multipart/form-data">
    <p>
      <button class="btn waves-effect waves-light" type="submit" name="pesquisar"> Pesquisar </button>   
    </p>
    <p>
      <input type="checkbox" name="casa" class="filled-in" id="casa" <?php if (isset($_SESSION['pesquisa']['casa'])) { echo "checked";  } ?>/>
      <label for="casa" class="white-text">Casa</label>
    </p>
    <p>
      <input type="checkbox" name="ap" class="filled-in" id="ap" <?php if (isset($_SESSION['pesquisa']['ap'])) { echo "checked";  } ?>/>
      <label for="ap" class="white-text">Apartamento</label>
    </p>
    <p>
      <input type="checkbox" name="comercial" class="filled-in" id="comercial" <?php if (isset($_SESSION['pesquisa']['comercial'])) { echo "checked";  } ?>/>
      <label for="comercial" class="white-text">Ponto Comercial</label>
    </p>
    <p>
      <input type="checkbox" name="quintal" class="filled-in" id="quintal" <?php if (isset($_SESSION['pesquisa']['quintal'])) { echo "checked";  } ?>/>
      <label for="quintal" class="white-text">Quintal</label>
    </p>
    <p>
      <input type="checkbox" name="varanda" class="filled-in" id="varanda" <?php if (isset($_SESSION['pesquisa']['varanda'])) { echo "checked";  } ?>/>
      <label for="varanda" class="white-text">Varanda</label>
    </p> 
    <div class="input-field">
      <input type="number" id="quarto_suite" name="quarto_suite" class="white-text" value="<?php if (isset($_SESSION['pesquisa']['quarto_suite'])) { echo $_SESSION['pesquisa']['quarto_suite']; } ?>" >
      
      <label for="quarto_suite" class="white-text">Quantidade de Quartos + Suites</label>
    </div>
    <div class="input-field">
      <input type="number" id="suite" name="suite" class="white-text" value="<?php if (isset($_SESSION['pesquisa']['suite'])) { echo $_SESSION['pesquisa']['suite']; } ?>">
      <label for="suite" class="white-text">Quantidade de Suites</label>
    </div>
    <div class="input-field">
      <input type="number" id="banheiro" name="banheiro" class="white-text" value="<?php if (isset($_SESSION['pesquisa']['banheiro'])) { echo $_SESSION['pesquisa']['banheiro']; } ?>">
      <label for="banheiro" class="white-text">Quantidade de Banheiros Sociais</label>
    </div>          
    <div class="input-field">
      <input type="number" id="garagem" name="garagem" class="white-text" value="<?php if (isset($_SESSION['pesquisa']['garagem'])) { echo $_SESSION['pesquisa']['garagem']; } ?>">
      <label for="suite" class="white-text">Capacidade da Garagem</label>
    </div>                      

  </form>   

</div>
