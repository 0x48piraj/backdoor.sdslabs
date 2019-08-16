<?php

include 'secrets.php';

$MAX_PASSWORD_LENGTH = 32;
$SLEEP_TIME_BRUTEFORCE = 3;

function customStringComparison($a, $b){
    global $SLEEP_TIME_BRUTEFORCE;

    for($i = 0; $i < strlen($a) ; $i++) {
        if($b[$i] === ""){ // b is smaller than a
            return false;
        }

        if($a[$i] !== $b[$i]){ // Doesn't match
            sleep($SLEEP_TIME_BRUTEFORCE); // Prevents BruteForce attacks
            return false;
        }
    }
    return true;
}

$error = false;
$errorMessage = false;

if(isset($_GET['password'])){
    $password = $_GET['password'];

    if(strlen($password) <= 0){
        $error = true;
        $errorMessage = "Please! Enter password";
    }
    elseif(strlen($password) > $MAX_PASSWORD_LENGTH){
        $error = true;
        $errorMessage = "Max password length is $MAX_PASSWORD_LENGTH";
    }
    else{
        $valid = true;

        for($i = 0; $i<strlen($password); $i++){
            if(!($password[$i] === "0" || $password[$i] === "1")){
                $errorMessage = "Password is not in binary";
                $error = true;
                $valid = false;
                break;
            }
        }

        if($valid){
            if(customStringComparison($secretPassword, $password)){
                $errorMessage = "Flag is: ".$flag;
                $error = false;
            }
            else{
                $errorMessage = "Incorrect password";
                $error = true;
            }
        }
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Mad Overlord</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div id="container">
    <div id="formarea">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
            <?php
                if($errorMessage !== false){
                    echo '<div id="message" style="color:'.(($error)?'red':'green').';" >';
                    echo "<p>$errorMessage</p>";
                    echo '</div>';
                }
            ?>

            <p>PASSWORD</p>
            <p>
                <input type="password" name="password" maxlength="<?php echo $MAX_PASSWORD_LENGTH; ?>" id="passwordbox" placeholder="Enter password!">
            </p>
            <p>
                <input type="submit" value="Login" id="login">
            </p>
        </form>
    </div>
</div>
<!-- Source code at source.php -->
</body>
</html>