<?php

require 'Cripto.php';
require 'connection.php';

$cripto = new Cripto;
$password = '12345';
$salt = '2Sa&DMu%@T!oMs8d';

// Preparing the sql statements
$stmt = $pdo->prepare("INSERT INTO atividade_2_hash (name, password, salt) VALUES (:name, :password, :salt)");

// Inserting first row
$stmt->execute(array(
    ':name' => 'controle',
    ':password' => $password,
    ':salt' => ''
));

// Inserting second row
$stmt->execute(array(
    ':name' => 'md5 com salt',
    ':password' => $cripto->md5Salt($password, $salt),
    ':salt' => $salt
));

// Inserting third row
$stmt->execute(array(
    ':name' => 'sha1',
    ':password' => sha1($password),
    ':salt' => ''
));

// Inserting fourth and final row
$stmt->execute(array(
    ':name' => 'sha256',
    ':password' => $cripto->sha256($password),
    ':salt' => ''
));

echo 'All inserts concluded!';

?>