<?php
$password = 'control';
$options = ['cost' => 12];

echo '<p>', 'Password: ', $password, '.', '</p>';

// Generating hashes
$hash = password_hash($password, PASSWORD_BCRYPT, $options); 
echo '<p>', 'Example 1: ', $hash, ';', '</p>';
$hash = password_hash($password, PASSWORD_BCRYPT, $options); 
echo '<p>', 'Example 2: ', $hash, ';', '</p>';
$hash = password_hash($password, PASSWORD_BCRYPT, $options); 
echo '<p>', 'Example 3: ', $hash, '.', '</p>';

// Comparing
echo '<p>', (crypt($password, $hash) === $hash) ? 'Correct Password!' : 'Incorrect Password', '</p>';
?>