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
            margin: 5px 0 0 0;
        }

        p {
            margin-bottom: 0;
        }
        
        .spacer {
            padding-left: 5px;
        }
        
        .container {
            display: flex;
            justify-content: space-evenly;
        }
        .wrapper {
            margin: 10px 20px;
        }

        #justify {
            text-align: center;
            border: 2px;
            border-color: #000000;
        }
    </style>
    <h2 style="text-align: center;">Symmetric and Asymmetric Algorithms</h2>
    <div class='container'>
        <div class='wrapper'>
            <h3>AES encrypting</h3>
            <form method='POST'>
                <p>String:</p>
                <input type="text" name="e-string" class='spacer' size='50'><br>
                <p>Key:</p>
                <input type="text" name="e-key" class='spacer' placeholder='Minimum 16 Characters!' size='50'><br>
                <p>Salt:</p>
                <input type="text" name="e-salt" class='spacer' placeholder='16 Characters long!' size='50'><br><br>
                <input type="submit" value="Submit">
            </form>
        </div>
        <div class='wrapper'>
            <h3>AES decrypting</h3>
            <form method='POST'>
                <p>String:</p>
                <input type="text" name="d-string" class='spacer' size='50'><br>
                <p>Key:</p>
                <input type="text" name="d-key" class='spacer' placeholder='Minimum 16 Characters!' size='50'><br>
                <p>Salt:</p>
                <input type="text" name="d-salt" class='spacer' placeholder='16 Characters long!' size='50'><br><br>
                <input type="submit" value="Submit">
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

if (isset($_POST['e-string']) && isset($_POST['e-key']) && isset($_POST['e-salt'])) {
    $encrypted = aes_encrypt($_POST['e-string'], $_POST['e-key'], $_POST['e-salt']);
?>
    <p id='justify'> <?php echo 'The encrypted result is: '.$encrypted; ?> </p>
<?php
}

if (isset($_POST['d-string']) && isset($_POST['d-key']) && isset($_POST['d-salt'])) {
    $decrypted = aes_decrypt($_POST['d-string'], $_POST['d-key'], $_POST['d-salt']);
?>
    <p id='justify'> <?php echo 'The decrypted result is: '.$decrypted; ?> </p>
<?php

}

?>