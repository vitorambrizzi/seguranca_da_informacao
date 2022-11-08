<?php
function bcrypt_hash($string, $cost = '10') {
    $options = ['cost' => $cost];
    $hash = password_hash($string, PASSWORD_BCRYPT, $options);

    return $hash;
}

function bcrypt_compare($string, $hash) {
    return (crypt($string, $hash) === $hash) ? true : false;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BCrypt Algorithm</title>
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
    <h1>Bcrypt Hash and Compare</h1>
    <div class='container'>
        <div class='item-box'>
            <h2>Bcrypt Hashing</h2>
            <form method='POST'>
                <p>String:</p>
                <input type='text' name='h-string' size='50'><br>
                <p>Cost (between 4 and 16):</p>
                <input type='number' name='h-cost' min='4' max='16'><br>
                <br>
                <input type='submit' value='Submit'>
            </form>
        </div>
        <div class='item-box'>
            <h2>Bcrypt Comparing</h2>
            <form method='POST'>
                <p>String:</p>
                <input type='text' name='c-string' size='50'><br>
                <p>Hash:</p>
                <input type='text' name='c-hash' size='50'><br>
                <br>
                <input type='submit' value='Submit'>
            </form>
        </div>
    </div>
    <?php
    if (!empty($_POST)) {
       echo "<div class='container'>";
            echo "<div class='item-box'>";
                if (isset($_POST['h-string']) && isset($_POST['h-cost'])) {
                    $hash = bcrypt_hash($_POST['h-string'], $_POST['h-cost']);
                    echo '<p>', 'The resulting hash is: ', $hash, '</p>';        
                }

                if (isset($_POST['c-string']) && isset($_POST['c-hash'])) {
                    $equal = bcrypt_compare($_POST['c-string'], $_POST['c-hash']);
                    $message = ($equal) ? 'Your BCrypt hash is valid.' : 'Your string and hash do not match.';
                    echo '<p>', $message, '</p>';
                }
            echo '</div>';
        echo '</div>';
    }
    ?>    
</body>
</html>