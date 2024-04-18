<html>
<head>
    <link rel="stylesheet" href="../css/index.css">
</head>
<body>
    <div class="header">
        <h1 style="padding-top: 7px"> Welcome to My Website!</h1>
    </div>
    <div class="title">
        <h1> Sign Up </h1>
    </div>
    <div class="content">
        <form action="../BE/save_data.php" method="POST" name="sign-up-form">
            <label for="un">First Name</label>
            <br>
            <input type="text" name="firstname" id="txt">
            <br>
            <label for="un">Last Name</label>
            <br>
            <input type="text" name="lastname" id="txt">
            <br>
            <label for="un">Username</label>
            <br>
            <input type="text" name="username" id="txt">
            <br>
            <label for="pass">Password</label>
            <br>
            <input type="password" name="pass" class="txt">
            <br>
            <label for="pass">Confirm Password</label>
            <br>
            <input type="password" name="confirmPassword" class="txt">
            <br>           
            <label for="dob">Date of Birth</label>
            <br>
            <select name="month" id="dob">
                <option value="1">January</option>
                <option value="2">February</option>
                <option value="3">March</option>
                <option value="4">April</option>
                <option value="5">May</option>
                <option value="6">June</option>
                <option value="7">July</option>
                <option value="8">August</option>
                <option value="9">September</option>
                <option value="10">October</option>
                <option value="11">November</option>
                <option value="12">December</option>
            </select>        
            <select name="day" id="dob">
                <?php
                    for ($i=1; $i<32; $i++) {
                        echo "<option value='$i'>$i</option>";
                    }
                ?>
            </select>
            <select name="year" id="dob">
                <?php
                    $startYear = 2024 - 100;
                    for ($i = 2024; $i >= $startYear; $i--) {
                        echo "<option value='$i'>$i</option>";
                    }
                ?>
            </select>
            <br>
            <input type="radio" name="sex" checked id="r-male" value="m">
            <label for="r-male">Male</label>
            <input type="radio" name="sex" id="r-female" value="f">
            <label for="r-female">Female</label>
            <br>
            <input type="button" value="Sign Up" onclick="signUp()" id="butt">
            <input type="button" value="Cancel" onclick="clearForm()" id="butt">
        </form>
    </div>
    <div class="foot">
        <h3>Omar Mayassi Copyright ©</h3>
    </div>
<script>
    function signUp() {
        var Form=document.querySelector("form[name='sign-up-form']");
        var fn=Form.elements["firstname"].value;
        var ln=Form.elements["lastname"].value;
        var un=Form.elements["username"].value;
        var pass=Form.elements["pass"].value;
        var confPass=Form.elements["confirmPassword"].value;
        if ((fn=="")||(ln=="")) {
            alert("Fill in Firstname and Lastname!");
        } else if (un=="") {
            alert( "Username can't be empty!");
        } else if ((pass!=confPass)||(pass=="")) {
            alert("Passwords must be equal.");
        } else {
            Form.submit();
        }
    }
    
    function clearForm() {
        var Form=document.querySelector("form[name='sign-up-form']");
        Form.elements["firstname"].value="";
        Form.elements["lastname"].value="";
        Form.elements["username"].value="";
        Form.elements["pass"].value="";
        Form.elements["confirmPassword"].value="";
        document.getElementsByName("day")[0].selectedIndex = 0;
        document.getElementsByName("month")[0].selectedIndex = 0;
        document.getElementsByName("year")[0].selectedIndex = 0;
        document.getElementsByName("sex")[0].checked=true;
    }
</script>
</body>
</html>