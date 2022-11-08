<?php
class Crypto {
    // Returns the md5 hash from a given string with salt option
    static function md5_salt($string, $salt = '') {
        return md5($string.$salt);
    }

    // Returns the sha256 hash from a given string
    static function sha256($string) {
        return hash('sha256', $string);
    }
}
?>