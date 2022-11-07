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

    // BCrypt Algorithm
    static function bcrypt_hash($string, $cost = '10') {
        $options = ['cost' => $cost];
        $hash = password_hash($string, PASSWORD_BCRYPT, $options);

        return $hash;
    }

    static function bcrypt_compare($string, $hash) {
        return (crypt($string, $hash) === $hash) ? true : false;
    }
}
?>