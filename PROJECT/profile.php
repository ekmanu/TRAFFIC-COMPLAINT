<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./profile.css">
    <link rel="stylesheet" href="./styles.css">
    <link rel="stylesheet" href="./search.css">
    <title>PROFILE</title>
</head>
<?php
include ('./mail.php');
include ('./headers/header.php');

?>
<div >
    <form action="" method="POST">
        <button class="btn" name="butn">EDIT</button>
    </form>
    <div class="wrap">
        <h2 class="popo">MY PROFILE</h2>
       
        <?php
            echo "<div class='img'>".$_SESSION['PHOTO']."</div>"
        ?>
        <div><b>Welcome</b></div>
        <?php
            echo"  <table>
            <tr>
                <td>First Name:</td>
                <td>".$_SESSION['FIRSTNAME']."</td>
            </tr>
            <tr>
                <td>Second Name:</td>
                <td>".$_SESSION['SECONDNAME']."</td>
            </tr>
            <tr>
                <td>Email:</td>
                <td>".$_SESSION['EMAILADDRESS']."</td>
            </tr>
            <tr>
                <td>Phone Number:</td>
                <td>".$_SESSION['PHONE']."</td>
            </tr>
        </table>"
        ?>   
</div>
    
</body>
</html>