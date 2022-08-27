<?php

class Cripto {
    // Methods

    // Returns the sha256 hash from a given string
    function sha256($string) {
        return hash('sha256', $string);
    }

    // Returns the md5 hash from a given string with salt
    function md5Salt($string, $salt = '') {
        return md5($string . $salt);
    }
}

?>