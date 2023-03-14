<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGN UP</title>
    <link rel="stylesheet" href="../signup.css">
</head>
<body>
    <div><a href="index.php"><img src="../img/android-chrome-192x192.png" class="logo" alt="TETA"></a>
    </div>
    <div class="main">
        <form id ="form" class="form1" action="./registercar.php" method="POST" enctype="multipart/form-data" >
            <h1>Add Driver</h1>
            <small>
            <?php
            session_start();
            if(isset($_GET["error"])){
            if($_GET["error"] == "emptyinput"){
                echo "<p>Fill in all the fields!</p>";
            }

            if($_GET["error"] == "none"){
                echo "<p>Successfully Registered!</p>";
            }
            
            }?></small>
            <div class="forms ">
            <label for="BADGE NO">ID Number</label>
            <input type="number" id="ID" name="ID" placeholder="Enter ID Number">
            <small >  <?php
                        if(isset($_GET["error"])){
                             if ($_GET["error"] == "IDtaken"){
                                echo "<p>ID Number is already added </p>";
                          }} ?>
                </small>
        </div>
        <div class="forms" >
            <label for="name">First Name</label>
            <input type="text" id="firstname" name="firstname"  placeholder="Enter First Name">
            <small>
            <?php
                        if(isset($_GET["error"])){
                             if ($_GET["error"] == "invalidname"){
                                echo "<p>Name should contain letters only!</p>";
                                }} ?>
            </small>
        </div>
        <div class="forms" >
            <label for="name">Second Name</label>
            <input type="text" id="secondname" name="secondname"  placeholder="Enter Second Name">
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
                <label for="emailaddress">Email</label>
                <input type="email" id="emailaddress" name="emailaddress" placeholder="Enter your Email Address">
                <small>  <?php
                        if(isset($_GET["error"])){
                             if ($_GET["error"] == "invalidEmail"){
                                echo "<p>Enter a valid Email! </p>";
                                }} ?>
                </small>
        </div>
        <div class="forms" >
            <label for="car reg">CAR REG</label>
            <input type="text" id="firstname" name="carreg"  placeholder="Enter Car Registration">
        </div>
        <div class="forms" >
            <label for="firstname">CAR MAKE</label>
            <input type="text" id="firstname" name="carmake"  placeholder="Enter Car Make i.e TOYOTA">
            
        </div>
        <div class="forms" >
            <label for="firstname">CAR TYPE</label>
            <input type="text" id="firstname" name="type"  placeholder="Enter Car Type">
        </div>
        <div class="forms" >
            <label for="firstname">COLOUR</label>
            <input type="text" id="firstname" name="colour"  placeholder="Enter Colour">
            <small>
            <?php
                        if(isset($_GET["error"])){
                             if ($_GET["error"] == "invalidname"){
                                echo "<p>Colour should contain letters only!</p>";
                                }} ?>
            </small>
        </div>
        <div class="forms">
            <label for="secondname">Residence</label>
            <input type="text" name="residence"  placeholder="Enter Residence">
        </div>
        <button type="submit" name="submit">SUBMIT</button>
        </form>
    
</body>
</html>
