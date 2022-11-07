<?php
// Setting the connection parameters
$dbname = 'seguranca_da_informacao_db';
$host = 'localhost';
$dsn = 'mysql:dbname='.$dbname.';host='.$host;
$user = 'root';
$password = '';

// Trying to establish the connection
try {
	$conn = new PDO($dsn, $user, $password);
    // Setting the attribute to throw PDOExceptions
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    
// Error messaging
} catch (PDOException $e) {
    print('Error!: '.$e->getMessage().'<br/>');
    die();
}
?>