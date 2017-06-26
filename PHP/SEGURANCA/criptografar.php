<?php
//criptografia
// echo openssl_encrypt("dejota", 'asdas');

echo 'crypt: ' . crypt('rasmuslerdorf', 'rl') . "<br>";
echo 'Extended DES: ' . crypt('rasmuslerdorf', '_J9..rasm') . "<br>";
echo 'MD5:          ' . crypt('rasmuslerdorf', '$1$rasmusle$') . "<br>";
echo 'Blowfish:     ' . crypt('rasmuslerdorf', '$2a$07$rasmuslerd...........$') . "<br>";
//hashs e não é criptografia
// MD5
$string = 'O rato reu a ropa do rei de Roma';
$codificada = md5($string);
echo "Resultado da codificação usando md5: " . $codificada . "<br>";
// 54cf74d1acdb4037ab956c269b63c8ac

// SHA1
$string = 'O rato reu a ropa do rei de Roma';
$codificada = sha1($string);
echo "Resultado da codificação usando sha1: " . $codificada . "<br>";
// b186b709f7cf5a1d98d413379a66e511df8d59a4


//Incluir semente nos dados
$string = 'semente';
$hashMD5 = md5($string.'sementeMuit0Lowc4');
$hashSHA1 = sha1($string.'sementeMuit0Lowc4');


//encript hard

function encryptIt( $q ) {
    $cryptKey  = 'z3X5s8F4J2w9G1l6V7y0';
    $qEncoded  = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $q, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
    return( $qEncoded );
}

function decryptIt( $q ) {
    $cryptKey  = 'z3X5s8F4J2w9G1l6V7y0';
    $qDecoded  = rtrim( mcrypt_decrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), base64_decode( $q ), MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ), "\0");
    return( $qDecoded );
}

echo '?'. encryptIt('pagina').'='. encryptIt('cadastrar') ."<br>";
echo decryptar('Y2FkYX0xN0cmFy').'='.decryptar('Y2FkYX0xN0cmFy'). "<br>";


//encriar rapido
function encryptar($s) {
    return  base64_encode($s);
}
function decryptar($s) {
    return  base64_decode($s);
}

echo '?'. encryptar('pagina').'='. encryptar('cadastrar') ."<br>";
echo decryptar('Y2FkYX0xN0cmFy'). "<br>";
