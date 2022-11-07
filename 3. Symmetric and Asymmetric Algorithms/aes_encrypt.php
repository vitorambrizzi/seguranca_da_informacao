<?php
$message = 'Simple test message';
$algorithm = 'AES-256-CBC';
$passphrase = 'passphrase';
$iv = '*Szrw8&5ueCK$R6m';

$encrypted = openssl_encrypt($message, $algorithm, $passphrase, OPENSSL_RAW_DATA, $iv);

echo base64_encode($encrypted); 

// a saída da função é: ''
?>