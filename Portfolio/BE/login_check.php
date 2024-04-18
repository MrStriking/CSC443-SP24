<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $file = "user_data.txt";
    $lines = file($file, FILE_IGNORE_NEW_LINES);
    $authenticated = false;
    foreach ($lines as $line) {
        list($stored_username, $stored_password) = explode(", ", $line);
        if ($username == $stored_username && $password == $stored_password) {
            $_SESSION["username"] = $username;
            $authenticated = true;
            header("Location: ../pages/Intro.php");
            exit;
        }
    }
    if (!$authenticated) {
        echo '<script>alert("Invalid Username or Password!");</script>';
        header("Location: ../Index.php");
        exit;
    }
}
?>
