<?php
require 'connection.php';
require 'Crypto.php';

$password = '12345';
$salt = '2Sa&DMu%@T!oMs8d';

// Preparing the sql statement
$stmt = $conn->prepare(
    "INSERT INTO activity_2 (name, password, salt) VALUES (:name, :password, :salt);"
);

$stmt->execute(array(
    ':name' => 'control',
    ':password' => $password,
    ':salt' => ''
));

$stmt->execute(array(
    ':name' => 'md5 with salt',
    ':password' => Crypto::md5_salt($password, $salt),
    ':salt' => $salt
));

$stmt->execute(array(
    ':name' => 'sha1',
    ':password' => sha1($password),
    ':salt' => ''
));

$stmt->execute(array(
    ':name' => 'sha256',
    ':password' => Crypto::sha256($password),
    ':salt' => ''
));

print('All inserts concluded!');
?>