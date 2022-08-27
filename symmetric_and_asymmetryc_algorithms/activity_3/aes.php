<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activity 3</title>
</head>
<body>
    <style>
        input {
            margin: 5px 0 10px 0;
        }

        .spacer {
            padding: 0 90px;
        }

        .container {
            display: flex;
            justify-content: space-evenly;
        }
        .wrapper {
            margin: 10px 20px;
        }
    </style>
    <h2 style="text-align: center;">Symmetric and Asymmetric Algorithms</h2>
    <div class='container'>
        <div class='wrapper'>
            <h3>AES encrypting</h3>
            <form method='POST'>
                <label for="string">String:</label><br>
                <input type="text" name="estring" class='spacer'><br>
                <label for="key">Key:</label><br>
                <input type="text" name="ekey" class='spacer' placeholder='Minimum 16 Characters!'><br>
                <label for="salt">Salt:</label><br>
                <input type="text" name="esalt" class='spacer' placeholder='16 Characters long!'><br>
                <input type="submit" value="Submit"><br>
            </form>
        </div>
        <div class='wrapper'>
            <h3>AES decrypting</h3>
            <form method='POST'>
                <label for="string">String:</label><br>
                <input type="text" name="dstring" class='spacer'><br>
                <label for="key">Key:</label><br>
                <input type="text" name="dkey" class='spacer' placeholder='Minimum 16 Characters!'><br>
                <label for="salt">Salt:</label><br>
                <input type="text" name="dsalt" class='spacer' placeholder='16 Characters long!'><br>
                <input type="submit" value="Submit"><br>
            </form>
        </div>
    </div>
</body>
</html>
<?php

function aes_encrypt($string, $key, $salt){
    $message = openssl_encrypt($string, 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $salt);
    $encrypted = base64_encode($message);

    return $encrypted;
}

function aes_decrypt($string, $key, $salt) {
    $message = base64_decode($string);
    $decrypted = openssl_decrypt($message, 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $salt);

    return $decrypted;
}

$encrypted = aes_encrypt($_POST['estring'], $_POST['ekey'], $_POST['esalt']);
$decrypted = aes_decrypt($_POST['dstring'], $_POST['dkey'], $_POST['dsalt']);

if (isset($encrypted)) {
    echo $encrypted;
}
if (isset($decrypted)) {
    echo $decrypted;
}
?>