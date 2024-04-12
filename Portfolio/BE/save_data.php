<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $username = $_POST["username"];
    $password = $_POST["pass"];
    $confirmPassword = $_POST["confirmPassword"];
    $dob = $_POST["month"] . '/' . $_POST["day"] . '/' . $_POST["year"];
    $sex = isset($_POST["sex"]) ? $_POST["sex"] : "";
    $data = "Firstname: $firstname\nLastname: $lastname\nUsername: $username\nPassword: $password\nDate of Birth: $dob\nSex: $sex\n\n";
    $filename = "user_data.txt";
    file_put_contents($filename, $data, FILE_APPEND | LOCK_EX);
    header("Location: ../pages/Intro.php");
    exit();
} else {
    // Redirect to the signup form if accessed directly
    header("Location: ../pages/signup.php");
    exit();
}
?>
