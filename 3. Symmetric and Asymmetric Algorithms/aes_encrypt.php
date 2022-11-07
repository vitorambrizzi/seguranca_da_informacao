<?php

$string = "Madruga vence o Thanos";
$algoritmo = "AES-256-CBC";
$chave = "segredo em string";
$iv = "wNYtCnelXfOa6uiJ";

$mensagem = openssl_encrypt($string, $algoritmo, $chave, OPENSSL_RAW_DATA, $iv);

echo base64_encode($mensagem); 

//saida da função é "wrsniKgmS3EaC7CjOtMIhG+hQuMXn2u0JTVJ0feU7Rw="

?>