<?php
    session_start();
    if (!isset($_SESSION["username"])){
        header("location:../index.php");
    }
?>
<html>
<head>
    <link rel="stylesheet" href="../css/DB proj.css">
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
    <div class="whole">
        <h1> Custom Language Translator to Assembly </h1>
        <h2 style="text-align: center;"> CSC320 - Computer Organization </h2>
        <p> <span style="margin-left: 50px;">In</span> this project, two friends and myself created a website where
        a program input, using english and number characters, is translated to ARMv7. The input is the internet
        language of the Lebanese people. Often called "Arabize", it's a combination of english letters and numbers 
        that make out the pronuncaition of Lebanese Arabic words. Such translation was done through the detection 
        of for loops patterns as well as variable declaration patterns through JavaScript. Currently the website 
        only translates for loops and variable declaration, but implementing other features, such as if and while 
        statements are simple to implement. We also added the feature to attach a .bbl file for translation. Click 
        <a href="comp/index.html" style="color:aqua"> here</a> to access the project. </p> 
        <br>
        <h2 style="text-decoration: underline; font-size: 30px;"> Gallery: </h2>  
        <div class="Gallery">
            <?php
                $filename = '../images/CO_images.txt';
                $lines = file($filename, FILE_IGNORE_NEW_LINES);
                foreach ($lines as $image) {
                    $imagePath = "../images/$image";
                    echo "<a href=\"$imagePath\"><img src=\"$imagePath\"></a>";
                }
            ?>
        </div>
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