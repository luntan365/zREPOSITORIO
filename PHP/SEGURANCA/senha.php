<?php
$hash = password_hash('Dejota', PASSWORD_BCRYPT, ['cost' => 12]);
echo $hash.'<br>';
if (password_verify('Dejota', $hash)) {
    echo 'Password is valid!';
} else {
    echo 'Invalid password.';
}
?>
