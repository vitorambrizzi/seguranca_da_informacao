<?php

// Setting the connection parammeters
$dsn = 'mysql:dbname=segi3;host:localhost';
$user = 'root';
$password = '';

// Trying to stabilish the connection
try {
    $pdo = new PDO($dsn, $user, $password, );
    // Seting the attribute to throw PDOExceptions
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
// Error messaging
} catch (PDOException $e) {
    print 'Error!: ' . $e->getMessage() . '<br/>';
    die();
}

?>