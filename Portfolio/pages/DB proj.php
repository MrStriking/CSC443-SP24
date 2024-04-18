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
        <h1> Database Project for a Police Station </h1>
        <h2 style="text-align: center;"> CSC375 - Database Management Systems </h2>
        <p> <span style="margin-left: 50px;">In</span> this project, myself and four other members were asked to design a database for a futuristic police 
            station. We started off with designing the entity relation diagram which included the entities (employees, equipment, robots...), 
            their attributes, and the relations that tie these entities together. We then mapped the ER diagram to 
            relational ones using algorithms that suited each entity and relation. We then went on to implement the
            actual database using the Oracle SQL System where the actual conditions and types of each attribute and 
            relation were specified. Insertion statements were also used to populate the database. We also demonstrated
            various complex operations that could be done on the database through short real life situations. Finally,
            the database was normalized up to 3rd normal form (3nf) and Boyce-Codd Normal form (BCNF). It is worth 
            noting that our group got the <strong style="color: rgb(13, 235, 228);">highest</strong> grade on this project out 
            of around 20 other groups. Click <a href="Phase I, II, III, IV - ROKT.N.docx" style="color: aqua;"> here</a> to download the project report.</p> 
        <br>
        <h2 style="text-decoration: underline; font-size: 30px;"> Gallery: </h2>
        <div class="Gallery">
            <?php
                $filename = '../images/DB_images.txt';
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