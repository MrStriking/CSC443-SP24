<?php
    session_start();
    if (!isset($_SESSION["username"])){
        header("location:../index.php");
    }
?>
<html>
<head>
    <link rel="stylesheet" href="../css/contact.css">
    <link rel="stylesheet" href="../css/menu.css">
</head>
<body>
    <div class="menu">
        <table border="2" class="table-menu">
            <tbody class="tbody-menu">
                <tr class="tr-menu">
                    <th class="th-menu"> <a href="Intro.php" class="a-menu">Home</a> </th>
                    <th class="th-menu"> <a href="CV.php" class="a-menu">CV</a> </th>
                    <th class="th-menu"> <a href="portfolio.php" class="a-menu">Portfolio</a> </th>
                    <th class="th-menu"> <a href="contact.php" class="a-menu">Contact</a> </th>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="welcome">
        <h3> Hello <?php echo $_SESSION["username"]; ?>! </h3>
    </div>
    <br>
    <br>
    <h1>"You can call me on my cellphone"</h1>
    <h2>+961 81766850</h2>
    <br>
    <h1>"Or contact me via Email"</h1>
    <h2>omar.mayassi@outlook.com</h2>
    <br>
    <h1>"Hit me up on LinkedIn"</h1>
    <h2><a href="https://www.linkedin.com/in/omar-mayassi/" style="color: lightblue;"> linkedin.com/in/omar-mayassi/ </a></h2>
    <br>
    <h1>"Or follow me on Insta yay"</h1>
    <h2><a href="https://www.instagram.com/omar.mayassi/" style="color: lightblue;"> instagram.com/omar.mayassi/ </a></h2>
    <div class="foot">
        <div class="copyright">
            <h3>Omar Mayassi Copyright ©</h3>
        </div>
        <div class="logout">
            <input type=button value="Logout" onclick=logout()>
        </div>
    </div>
</body>
<script>
    function logout() {
        window.location.href = "../index.php"; 
    }
</script>
</html>