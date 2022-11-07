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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AES Algorithm</title>
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
            justify-content: space-evenly;
        }
        
        .item-box {
            margin: 10px 20px;
        }
    </style>
</head>
<body>
    <h1>AES Encrypt and Decrypt</h1>
    <div class='container'>
        <div class='item-box'>
            <h2>AES encrypting</h2>
            <form method='POST'>
                <p>String:</p>
                <input type="text" name="e-string" size='50'><br>
                <p>Key:</p>
                <input type="text" name="e-key" placeholder='Minimum 16 Characters!' size='50'><br>
                <p>Salt:</p>
                <input type="text" name="e-salt" placeholder='16 Characters long!' size='50'><br><br>
                <input type="submit" value="Submit">
            </form>
        </div>
        <div class='item-box'>
            <h2>AES decrypting</h2>
            <form method='POST'>
                <p>String:</p>
                <input type="text" name="d-string" size='50'><br>
                <p>Key:</p>
                <input type="text" name="d-key" placeholder='Minimum 16 Characters!' size='50'><br>
                <p>Salt:</p>
                <input type="text" name="d-salt" placeholder='16 Characters long!' size='50'><br><br>
                <input type="submit" value="Submit">
            </form>
        </div>
    </div>
    <div class='container'>
        <?php
        if (isset($_POST['e-string']) && isset($_POST['e-key']) && isset($_POST['e-salt'])) {
            $encrypted = aes_encrypt($_POST['e-string'], $_POST['e-key'], $_POST['e-salt']);
            echo "<div class='item-box'>The encrypted result is: ".$encrypted."</div>";        
        }

        if (isset($_POST['d-string']) && isset($_POST['d-key']) && isset($_POST['d-salt'])) {
            $decrypted = aes_decrypt($_POST['d-string'], $_POST['d-key'], $_POST['d-salt']);
            echo "<div class='item-box'>The decrypted result is: ".$decrypted."</div>";
        }
        ?>    
    </div>
</body>
</html>