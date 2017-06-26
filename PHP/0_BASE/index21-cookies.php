<?php




$value = 'alguma coisa de algum lugar';
setcookie("CookieTeste", $value);
setcookie("CookieTeste", $value, (time()+3600));  /* expira em 1 hora */
setcookie("CookieTeste", $value, time()+3600, "/minhaPastaCookie/", ".example.com", 1);

//=================Slavar Cookie==================================\\

if (isset($_COOKIE['count'])) {
  $count = $_COOKIE['count'] + 1;
} else {
  $count = 1;
}
setcookie('count', $count, time()+3600);
setcookie("Cart[$count]", $item, time()+3600);

//=================exibir vavor cookie====================\\

// Mostra um cookie individual
echo $_COOKIE["CookieTeste"];

//=================Excluir cookie==========================================\\
setcookie("CookieTeste", "", time() - 1);
setcookie("CookieTeste", "", time() - 1, "/~rasmus/", ".example.com", 1);

//=================EXEMPLO cookie==========================================\\
// envia os cookies
setcookie("cookie[tres]", "cookietres");
setcookie("cookie[dois]", "cookiedois");
setcookie("cookie[um]", "cookieum");

// Depois que a página recarregar, mostra eles
if (isset($_COOKIE['cookie'])) {
    foreach ($_COOKIE['cookie'] as $nome => $valor) {
        $nome = htmlspecialchars($nome);
        $valor = htmlspecialchars($valor);
        echo "$nome : $valor <br />\n";
    }
}

?>
