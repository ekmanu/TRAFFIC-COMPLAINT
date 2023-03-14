<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>
<body>
<div class="menu">
        <nav>
         <a href="index.php"><img src="img/android-chrome-192x192.png" class="logo" alt="TETA"></a>
        <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="Complaints.php">Complaints</a></li>
        <li><a href="#">Contact Us</a></li>
        <?php 
        
        if(isset($_SESSION["USERID"])){

            echo "<li class='login' ><a href='profile.php'>Profile</a></li>";
           echo "<form method='POST'><li class='login' ><a href='logout.php' name='logout'>LOGOUT</a></li></form>";
        }
        else{
            echo " <li class='login'><a href='login.php'>LOGIN</a></li>";
            echo "<li class='login'><a href='signup.php'>SIGN UP</a></li>";
        }
        
        ?>
        

    </nav>
    </div>   
</body>
</html>
