<?php

function anti_injection_html($sql){
  return trim(htmlspecialchars($sql));
}

  //modo de usar pegando dados vindos do formulario
  // $nome = anti_injection_html($_POST["nome"]);
  // $senha = anti_injection_html($_POST["senha"]);


?>
