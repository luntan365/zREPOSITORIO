<?php
// FILTER_VALIDATE_* = valida
// FILTER_SANITIZE_* = remover os caracter invalidos

var_dump(filter_var('bob@example.com', FILTER_VALIDATE_EMAIL));
var_dump(filter_var('example.com', FILTER_VALIDATE_URL, FILTER_FLAG_SCHEME_REQUIRED));

var_dump(filter_var('192.168.0,1', FILTER_VALIDATE_IP));
var_dump(filter_var(2.5, FILTER_VALIDATE_FLOAT));
var_dump(filter_var(2.5, FILTER_VALIDATE_BOOLEAN));
$var = filter_var(755, FILTER_VALIDATE_INT);
