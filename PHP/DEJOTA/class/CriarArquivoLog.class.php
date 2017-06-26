<?php
  abstract class CriarArquivoLog {

    private $arquivo;

    private function criar_direotrio($caminhopasta, $permissao){
      if(!is_dir($caminhopasta)): //se diretorio nao existir
        mkdir($caminhopasta, $permissao); //cria a pasta
      endif;
    }

    protected function criar_arquivo($caminhopasta, $permissao, $arquivo, $mode, $mensagem){
      $this->criar_direotrio($caminhopasta, $permissao);
      $this->arquivo = fopen($caminhopasta.$arquivo, $mode); //cria arquivo
      fwrite($this->arquivo, date('d/m/Y H:i:s T').PHP_EOL.$mensagem.PHP_EOL.'*****FIM*****'.PHP_EOL.PHP_EOL); //escreve o arquivo
      fclose($this->arquivo); //fecha o arquivo
    }

  }
