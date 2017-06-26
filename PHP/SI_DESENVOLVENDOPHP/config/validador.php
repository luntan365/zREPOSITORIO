<?php

function anti_injection_html($sql){
  return trim(htmlspecialchars($sql));
}

  function vSenha($text){
    if (!preg_match('/^[a-z0-9]*$/i',$text)):
      return false;
    else:
      return true;
    endif;
  }

  function vEmail($text){
    if (!preg_match('/^([a-z0-9\.\-_])+([@])([a-z0-9]).([a-z]{2,3})/',$text)):
      return false;
    else:
        $dominio = explode('@',$text);
        if(!checkdnsrr($dominio[1],'A')):
          return false;
        else:
          return true;
        endif;
    endif;
  }
