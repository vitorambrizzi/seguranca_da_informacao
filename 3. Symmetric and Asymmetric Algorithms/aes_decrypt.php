<?php
$message = "Uls6le2+pY9yHxcojOT/ow==";
$algoritmo = "AES-256-CBC";
$chave = "segredo em string";
$iv = "wNYtCnelXfOa6uiJ";

$mensagem = base64_decode($mensagem);

$mensagem = openssl_decrypt($mensagem, $algoritmo, $chave, OPENSSL_RAW_DATA, $iv);

echo $mensagem;
?>