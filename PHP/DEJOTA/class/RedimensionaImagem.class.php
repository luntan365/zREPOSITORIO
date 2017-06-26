<?php

// $imgr = new Imgr('img/originais/', 'img/redimensionadas/');
// <img src="<?php $imgr->src('elfa.jpg', 250); ? >" >

class RedimensionaImagem {

  private $diretorio_fonte;
  private $diretorio_destino;

  function __construct($diretorio_fonte, $diretorio_destino) {
    $this->diretorio_fonte = $diretorio_fonte;
    $this->diretorio_destino = $diretorio_destino;
  }

  public function src($name, $largura=100, $altura=null){

    if(file_exists($this->diretorio_fonte.$name)):
      $nome_aquivo = pathinfo($name)['filename'];
      $estensao = pathinfo($name)['extension'];

      switch ($estensao):
        case 'jpeg': $imagem_temp = imagecreatefromjpeg($this->diretorio_fonte.$name);  break;
        case 'jpg':  $imagem_temp = imagecreatefromjpeg($this->diretorio_fonte.$name);  break;
        case 'png':  $imagem_temp = imagecreatefrompng($this->diretorio_fonte.$name);   break;
        case 'gif':  $imagem_temp = imagecreatefromgif($this->diretorio_fonte.$name);   break;
        default: throw new Exception('Use formatos de imagem: jpg, jpeg, png ou gif');  break;
      endswitch;

      $largura_original = imagesx($imagem_temp);
      $altura_original = imagesy($imagem_temp);
      $nova_altura = $altura ? $altura : floor(($altura_original/$largura_original)*$largura);

      $src = $this->diretorio_destino.$nome_aquivo.$largura.'x'.$nova_altura.'.'.$estensao;

      if (file_exists($src)):
        imagedestroy($imagem_temp);
        echo $src;
        return;
      endif;

      $imagem_redimensionada = imagecreatetruecolor($largura, $nova_altura);
      imagecopyresampled($imagem_redimensionada, $imagem_temp, 0, 0, 0, 0, $largura, $nova_altura, $largura_original, $altura_original);

      switch ($estensao):
        case 'jpeg': imagejpeg($imagem_redimensionada, $src, 100);   break;
        case 'jpg':  imagejpeg($imagem_redimensionada, $src, 100);   break;
        case 'png':  imagepng($imagem_redimensionada, $src, 1);      break;
        case 'gif':  imagegif($imagem_redimensionada, $src);         break;
        default: throw new Exception('Use formatos de imagem: jpg, jpeg, png ou gif');  break;
      endswitch;

      imagedestroy($imagem_temp);
      imagedestroy($imagem_redimensionada);
      echo $src;
    else:
      throw new Exception("arquivo ".$this->diretorio_fonte.$name." não existe");
    endif;

  }//fim metodo

}//fim class
