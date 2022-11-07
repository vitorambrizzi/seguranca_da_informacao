<?php
class Crypto {
    // AES Algorithm
    static function aes_encrypt($string, $key, $salt){
        $message = openssl_encrypt($string, 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $salt);
        $encrypted = base64_encode($message);
    
        return $encrypted;
    }

    static function aes_decrypt($string, $key, $salt) {
        $message = base64_decode($string);
        $decrypted = openssl_decrypt($message, 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $salt);
    
        return $decrypted;
    }

    
}
?>