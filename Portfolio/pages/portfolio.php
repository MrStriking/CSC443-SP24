<?php
    session_start();
    if (!isset($_SESSION["username"])){
        header("location:../index.php");
    }
?>
<html>
<head>
    <link rel="stylesheet" href="../css/portfolio.css">
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
    <div class="proj1">
        <a href="DB proj.php"><img src="../images/db.png"></a>
        <h1> Database Project for a Police Station </h1>
        <h2> CSC375 - Database Management Systems </h2>
    </div>
    <div class="proj2">
        <a href="CO proj.php"><img src="../images/Co.jpg"></a>
        <h1> Assembly to Custom Language Translator </h1>
        <h2> CSC320 - Computer Organization </h2>
    </div>

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