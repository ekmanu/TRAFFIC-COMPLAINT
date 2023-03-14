<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="stylesheet" href="./styles.css">
    <link rel="stylesheet" href="./complaintsform.css">
</head>
<body>
<?php
include ('./mail.php');
include ('./headers/header.php');
?>
     <div class="page2">
           <div class="compl">
             <div class="page">
                <h1>Complaint Form</h1>
            </div>
        </div>
     </div>
     <div  class="para">
     <p >To make a complaint choose between the categories below where you need to file your complaint form.File complaint against </p>
     </div>

                          
          <section class="part3" id="part3">
            <div class="col3">
                <p>
                    <a href="./policecomplaints.php">
                        <img src="./img/officer.png" alt="OFFICER IMG">
                        <span>TRAFFIC OFFICER</span>
                    </a>
                </p>
            </div>
            <div class="col3">
                <p>
                    <a href="./usercomplaints.php">
                        <img src="./img/driver.png" alt="DRIVER IMG">
                        <span>MOTORIST/MOTORCYCLIST</span>
                    </a>
                </p>
            </div>
        </div>
        </section>
   
</body>
</html>