<?php
//  CRIPITOGRAFANDAO SENHA
$pass = password_hash("dejota", PASSWORD_BCRYPT);
echo $pass."<br>";
$pass = password_hash("dejota", PASSWORD_BCRYPT);
echo $pass."<br>";

// VERIFICANDO SE A SENHA E VALIDA
if (password_verify('dejota', $pass)) {
    echo 'Password is valid!';
} else {
    echo 'Invalid password.';
}
