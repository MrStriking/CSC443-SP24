<?php 
session_start();
session_unset();
session_destroy();
?>

<html>
<head>
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <div class="header">
        <h1 style="padding-top: 7px"> Welcome to My Website!</h1>
    </div>
    <div class="title">
        <h1> Login </h1>
    </div>
    <div class="content">
        <form action="BE/login_check.php" method="POST" id="login-form">
            <label for="un">Username</label>
            <br>
            <input type="text" name="username" id="un">
            <br>
            <label for="pass">Password</label>
            <br>
            <input type="password" name="password" id="pass">
            <br>
            <input type="button" value="Login" onclick="login()" id="butt">
            <input type="button" value="Cancel" onclick="clearForm()" id="butt">
        </form>
        <a href="pages/signup.php" style="color: aqua">New here? Sign up!</a>
    </div>
    <div class="foot">
        <h3>Omar Mayassi Copyright ©</h3>
    </div>
<script>
    function login() {
        var un=document.getElementById("un").value;
        var pass=document.getElementById("pass").value;
        if ((un=="")||(pass=="")) {
            alert("Fill in the username and the password!");
        } else {
            document.getElementById("login-form").submit();
        }
    }
    function clearForm() {
        document.getElementById("un").value="";
        document.getElementById("pass").value="";
    }
</script>
</body>
</html>