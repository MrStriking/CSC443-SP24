<?php
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $username = $_POST["username"];
    $password = $_POST["pass"];
    $confirmPassword = $_POST["confirmPassword"];
    $dob = $_POST["month"] . '/' . $_POST["day"] . '/' . $_POST["year"];
    $sex = $_POST["sex"];
    $filename = "user_data.txt";
    if (checkUsername($filename, $username)) { 
        echo '<script>alert("Welcome to Geeks for Geeks");</script>';
        header("Location: ../pages/signup.php");
        exit();
    }
    $data = "$username, $password, $firstname, $lastname, $dob, $sex\n\n";
    file_put_contents($filename, $data, FILE_APPEND | LOCK_EX);
    header("Location: ../pages/Intro.php");
    exit();

    function checkUsername($filename, $username) {
        $lines = file($filename, FILE_IGNORE_NEW_LINES);
        foreach ($lines as $line) {
            list($stored_username, $stored_password) = explode(",", $line);
            if ($username == $stored_username) {
                return true;
            }
        }
        return false;
    }
?>
