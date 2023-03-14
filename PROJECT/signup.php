<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGN UP</title>
    <link rel="stylesheet" href="signup.css">
</head>
<body>
    <div><a href="index.php"><img src="img/android-chrome-192x192.png" class="logo" alt="TETA"></a>
    </div>
    <div class="main">
        <form id ="form" class="form1" action="./includes/signupset.php" method="POST" enctype="multipart/form-data" >
            <h1>Create your TETA Account</h1>
            <small>
            <?php
            if(isset($_GET["error"])){
            if($_GET["error"] == "emptyinput"){
                echo "<p>Fill in all the fields!</p>";
            }

            if($_GET["error"] == "none"){
                echo "<p>Successfully signed up!</p> <p>Kindly Login!</p>";
            }
            
            }?></small>
            <div class="forms ">
            <label for="ID">ID Number</label>
            <input type="number" id="ID" name="ID" placeholder="Enter ID number">
            <small >  <?php
                        if(isset($_GET["error"])){
                             if ($_GET["error"] == "IDtaken"){
                                echo "<p>Id is already taken </p>";
                          }} ?>
                </small>
        </div>
        <div class="forms" >
            <label for="firstname">First Name</label>
            <input type="text" id="firstname" name="firstname"  placeholder="Enter First Name">
            <small>
            <?php
                        if(isset($_GET["error"])){
                             if ($_GET["error"] == "invalidname"){
                                echo "<p>Name should contain letters only!</p>";
                                }} ?>
            </small>
        </div>
        <div class="forms">
            <label for="secondname">Second name</label>
            <input type="text" name="secondname" id="secondname" placeholder="Enter Second Name">
            <input type="hidden" value="ADMIN" name="ADMIN" id="secondname" placeholder="Enter Second Name">
            <input type="hidden" value="USER" name="USER" id="secondname" placeholder="Enter Second Name">
            <small>
            <?php
                        if(isset($_GET["error"])){
                             if ($_GET["error"] == "invalidname"){
                                echo "<p>Name should contain letters only!</p>";
                                }} ?>
            </small>
        </div>
        <div class="forms">
            <label for="phonenumber">Phone number</label>
            <input type="tel" id="phonenumber" name="phonenumber"placeholder="e.g. +254723456789">
            <small><?php
                        if(isset($_GET["error"])){
                             if ($_GET["error"] == "invalidtelephone"){
                                echo "<p>Enter a valid telephone in the right format! </p>";
                                }} ?></small>
            </div>
        <div class="forms">
                <label for="emailaddress">Email Address</label>
                <input type="email" id="emailaddress" name="emailaddress" placeholder="Enter your Email Address">
                <small>  <?php
                        if(isset($_GET["error"])){
                             if ($_GET["error"] == "invalidEmail"){
                                echo "<p>Enter a valid Email! </p>";
                                }} ?>
                </small>
        </div>
        <div class="forms">
            <label for="passwrd">Password</label>
            <input type="password" id="passwrd" name="passwrd" placeholder="Enter password">
            <small><?php
                        if(isset($_GET["error"])){
                             if ($_GET["error"] == "passwordsdontmatch"){
                                echo "<p>The confrirmation password does not match </p>";
                                }} ?>
            </small>
        </div>
        <div class="forms">
            <label for="password2">Confirm Password</label>
            <input type="password" id="password2" name="password2" placeholder="Enter password again">
            <small> </small>
        </div>
         <div class="forms">
         <small>
            <?php
                        if(isset($_GET["error"])){
                             if ($_GET["error"] == "invalidphotoextension"){
                                echo "<p>Upload Images only!</p>";
                                }} ?>
            </small>
            <label for="photo">Upload your Image</label>
            <input type="file" id="photo" name="photo" >
        </div>
        <button type="submit" name="submit">Create Account </button>
        <div class="up">
            <span >Already a member?</span>
            <a href="login.php">Login</a>
        </form>
    
</body>
</html>
