 
<!DOCTYPE html>
<html lang="en">
<head>
    
<script language="javascript" type="text/javascript">
        window.history.forward();
    </script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./signup.css">
</head>
<body>
<div class="form1">
<div><a href="#"><img src="img/android-chrome-192x192.png" class="logo" alt="TETA"></a>
    </div>
    <div class="main">
        <form id ="form" class="form1"  method="post" action="./includes/loginset.php">
            <h1>LOGIN TO YOUR TETA ACCOUNT</h1>
            <small>
            <?php
                        if(isset($_GET["error"])){
                             if ($_GET["error"] == "IDtaken"){
                                echo "<p>Id is already taken </p>";
                          }} ?></small>
              <small>            
            <?php
                        if(isset($_GET["error"])){
                             if ($_GET["error"] == "wronglogin"){
                                echo "<p>Incorrect ID/PASSWORD</p>";
                          }} ?> </small>
                          <small>            
            <?php
                        if(isset($_GET["error"])){
                             if ($_GET["error"] == "emptyinput"){
                                echo "<p>Fill in the fields</p>";
                          }} ?> </small>
            <div class="forms ">
            <label for="ID">ID Number</label>
            <input type="number" name="ID" id="ID" placeholder="Enter ID number">
            <small></small>
        </div>
        <div class="forms">
            <label for="passwrd">Password</label>
            <input type="password" id="passwrd" placeholder="Enter password" name="passwrd">
            <small></small>
        </div>
        <button type="submit" name="login">LOGIN</button>
        <div class="up">
            <span >Not Registered?</span>
            <a href="signup.php">Click Here</a>
        <div class="up">
            <span >For Investigating Officers</span>
            <a href="./investigator/indexpage.php">Click Here</a>
        </form>
    </div>
</body>
</html>