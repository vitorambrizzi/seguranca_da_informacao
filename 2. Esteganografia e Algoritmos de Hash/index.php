<?php
require 'connection.php';
require 'Crypto.php';

// Preparing the sql statements
$stmt = $conn->prepare(
    "INSERT INTO activity_2 (name, string, salt) VALUES (:name, :string, :salt);"
);
$stmt_saltless = $conn->prepare(
    "INSERT INTO activity_2 (name, string) VALUES (:name, :string);"
);

// Managing the inserts
if (isset($_POST['string']) && isset($_POST['salt'])) {
    $string = $_POST['string'];
    $salt = $_POST['salt'];

    $stmt_saltless->execute(array(
        ':name' => 'control',
        ':string' => $string
    ));

    if (empty($salt)) {
        $md5 = md5($string);
        $stmt_saltless->execute(array(
            ':name' => 'md5',
            ':string' => $md5
        ));
    } else {
        $md5 = Crypto::md5_salt($string, $salt);
        $stmt->execute(array(
            ':name' => 'md5 with salt',
            ':string' => $md5,
            ':salt' => $salt
        ));
    }
    
    $sha1 = sha1($string);
    $stmt_saltless->execute(array(
        ':name' => 'sha1',
        ':string' => $sha1
    ));
    
    $sha256 = Crypto::sha256($string);
    $stmt_saltless->execute(array(
        ':name' => 'sha256',
        ':string' => $sha256
    ));
}    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hash Algorithms</title>
    <style>
        h1, h2 {
            text-align: center;    
        }
        
        input {
            padding-left: 5px;
        }

        p {
            margin-bottom: 5px;
        }

        .container {
            display: flex;
            flex-flow: column wrap;
        }
        
        .item-box {
            margin: 10px 20px;
            align-self: center;
        }
    </style>
</head>
<body>
    <div class='container'>
        <div class='item-box'>
            <h1>MD5, SHA1 and SHA256 Hash Generator</h1>
            <p>This page saves a given string three times into seguranca_da_informacao_db, hashed with MD5, SHA1, and SHA256.</p>
            <p>It also has a salt input, but the salt will only be added to the MD5 hash.</p>
        </div>
        <div class='item-box'>
            <h2>AES encrypting</h2>
            <form method='POST'>
                <p>String:</p>
                <input type="string" name="string" size='50'><br>
                <p>Salt:</p>
                <input type="text" name="salt" placeholder='The more characters, the better!' size='50'><br>
                <br>
                <input type="submit" value="Submit">
            </form>
        </div>
        <?php
        // Feedback messaging
        if (isset($string) && isset($salt)) {
            echo "<div class='item-box'>";
                echo '<p>String given: '.$string.'</p>';
                echo '<p>', ($salt) ? 'Salt given: '.$salt : 'No salt given!', '</p>';
                echo '<p>MD5: '.$md5.'</p>';
                echo '<p>SHA1: '.$sha1.'</p>';
                echo '<p>SHA256: '.$sha256.'</p>';
            echo '</div>';
        }
        ?>
    </div>
</body>
</html>