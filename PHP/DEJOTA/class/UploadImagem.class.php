<?php

class UploadImagem {

  private $src;

  function __construct($nameTag, $destino, $largura=100, $altura=null){

    if ( isset($_FILES[$nameTag]['name']) && $_FILES[$nameTag]['error'] == 0 ) {

      $tamnhoMaximo = 1024 * 1024 * 2;
      if ($_FILES[ $nameTag ][ 'size' ] <= $tamnhoMaximo) {
          $diretorio = $_FILES[ $nameTag ][ 'tmp_name' ];
          $nome = $_FILES[ $nameTag ][ 'name' ];
          $extensao = strtolower(pathinfo( $nome, PATHINFO_EXTENSION));

          if (strstr('.jpg;.jpeg;.gif;.png', $extensao)) {

              $novoNome = uniqid(time());
              criar_direotrio($destino);
              $this->src = redimensionar($diretorio, $destino, $novoNome, $extensao, $largura, $altura);

          } else { throw new Exception('Enviar apenas imagens jpg, jpeg, gif ou png.'); }
      } else { throw new Exception('Envie arquivo de no máximo 2 Megabytes.'); }
    } else {  throw new Exception('Nenhuma imagem enviada.'); }
  }


  //=====================================================================

  private function criar_direotrio($dir){
    if(!is_dir($dir)):
      mkdir($dir, 0777, true);
    endif;
  }

  //=======================================================================


  private function redimensionar($diretorio_fonte, $diretorio_destino, $nome_aquivo, $extensao, $largura=100, $altura=null){

      switch ($extensao):
        case 'jpeg': $imagem_temp = imagecreatefromjpeg($diretorio_fonte);  break;
        case 'jpg':  $imagem_temp = imagecreatefromjpeg($diretorio_fonte);  break;
        case 'png':  $imagem_temp = imagecreatefrompng($diretorio_fonte);   break;
        case 'gif':  $imagem_temp = imagecreatefromgif($diretorio_fonte);   break;
        default: throw new Exception('Use formatos de imagem: jpg, jpeg, png ou gif');  break;
      endswitch;

      $largura_original = imagesx($imagem_temp);
      $altura_original = imagesy($imagem_temp);
      $nova_altura = $altura ? $altura : floor(($altura_original/$largura_original)*$largura);
      if (!isset($altura) && $nova_altura > $largura) { $nova_altura = $largura; }

      $src = $diretorio_destino.'/'.$nome_aquivo.'.'.$extensao;

      $imagem_redimensionada = imagecreatetruecolor($largura, $nova_altura);
      imagecopyresampled($imagem_redimensionada, $imagem_temp, 0, 0, 0, 0, $largura, $nova_altura, $largura_original, $altura_original);

      switch ($extensao):
        case 'jpeg': imagejpeg($imagem_redimensionada, $src, 100);   break;
        case 'jpg':  imagejpeg($imagem_redimensionada, $src, 100);   break;
        case 'png':  imagepng($imagem_redimensionada, $src, 1);      break;
        case 'gif':  imagegif($imagem_redimensionada, $src);         break;
        default: throw new Exception('Use formatos de imagem: jpg, jpeg, png ou gif');  break;
      endswitch;

      imagedestroy($imagem_temp);
      imagedestroy($imagem_redimensionada);
      return $src;
  }

  public function __toString(){
    return $this->src;
  }

}//fim classe
