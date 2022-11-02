<?php
// Setting the connection parameters
$host = 'localhost';
$dbname = 'seguranca_da_informacao_db';
$user = 'root';
$password = '';

// Trying to establish the connection
try {
	$conn = new PDO('mysql:host='.$host.';dbname='.$dbname, $user, $password);
    // Setting the attribute to throw PDOExceptions
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    
// Error messaging
} catch (PDOException $e) {
    print('Error!: '.$e->getMessage().'<br/>');
    die();
}
?>