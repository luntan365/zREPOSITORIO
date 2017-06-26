<?php

function uploadImagem($nameTag, $destino){

  // verifica se foi enviado um arquivo
  if ( isset($_FILES[$nameTag]['name']) && $_FILES[$nameTag]['error'] == 0 ) {

    // echo 'Você enviou o arquivo: <strong>' . $_FILES[ $nameTag ][ 'name' ] . '</strong><br />';
    // echo 'Este arquivo é do tipo: <strong > ' . $_FILES[ $nameTag ][ 'type' ] . ' </strong ><br />';
    // echo 'Temporáriamente foi salvo em: <strong>' . $_FILES[ $nameTag ][ 'tmp_name' ] . '</strong><br />';
    // echo 'Seu tamanho é: <strong>' . $_FILES[ $nameTag ][ 'size' ] . '</strong> Bytes<br /><br />';

    //receber arquivos de no máximo 2MB
    $tamnhoMaximo = 1024 * 1024 * 2;
    if ($_FILES[ $nameTag ][ 'size' ] <= $tamnhoMaximo) {

        // pega diretorio que arquivo temporario está
        $diretorio = $_FILES[ $nameTag ][ 'tmp_name' ];

        // pega o nome do arquivo
        $nome = $_FILES[ $nameTag ][ 'name' ];

        // Pega a extensão
        $extensao = pathinfo ( $nome, PATHINFO_EXTENSION );
        // Converte a extensão para minúsculo
        $extensao = strtolower ( $extensao );

        // Somente imagens, .jpg;.jpeg;.gif;.png
        // Aqui eu enfileiro as extensões permitidas e separo por ';'
        // Isso serve apenas para eu poder pesquisar dentro desta String
        if ( strstr ( '.jpg;.jpeg;.gif;.png', $extensao ) ) {
            // Cria um nome único para esta imagem
            // Evita que duplique as imagens no servidor.
            // Evita nomes com acentos, espaços e caracteres não alfanuméricos
            $novoNome = uniqid ( time () ) . '.' . $extensao;

            // Concatena a pasta com o nome
            $destino = $destino . $novoNome;

            // tenta mover o arquivo para o destino
            if ( move_uploaded_file ( $diretorio, $destino ) ) {
                  // echo '<img src="'.$destino.'"> <br/>';
                return $novoNome;
            } else { echo 'Erro ao salvar o arquivo no servidor. <br />';  }
        } else { echo 'Você poderá enviar apenas arquivos jpg, jpeg, gif ou png. <br/>';  }
    } else { echo 'Arquivo muito grande, envie arquivo de no máximo 2 Megabytes. <br/>';  }
  } else {  /*echo 'Você não enviou nenhum arquivo!';*/ }
}

?>
