
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="./admin.css">
    <link href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
<?php include ('../headers/header2.php');
session_start();

?>
<section class="whole">
<section id="admenu">
    <div class="items">
    <a href="./admin.php"><li><i class="fad fa-rocket"></i>Dashboard</li></a>
    <a href="./users.php"><li><i class="fad fa-user-circle"></i>Users</li></a>
    <a href="./admcomplaints.php"><li><i class="fad fa-book "></i>Complaints</li></a>
    <a href="./admdriver.php"><li><i class="fad fa-user"></i>Drivers</li></a>
    <a href="./admpolice.php"><li><i class="fas fa-user"></i>Police Officer</li></a>
    <a href="./admreport.php"><li class="child"><i class="fad fa-file"></i>Reports</li></a>
    <a href="./investigat.php"><li><i class="fas fa-user"></i>Investigators</li></a>
    <a href="./logoutad.php"><li><i ></i>LOG OUT</li></a>


    </div> 
</section>
<?php
 require_once '../includes/conn.php';
 if(isset($_POST['editbtn'])){
                $ud = $_POST['edit_id'];
                $status=$_POST['status'];
                
               echo " <section class='kuk'>
    <section class='sidepage'>
        <div class='headie'>
            <div class='top'>
                <h3>ENTER A DETAILED REPORT ABOUT THE COMPLAINT:</h3>
            </div>
            <section class='rest'>
                    <section class='part1'>
                        <form action='send22.php' method='POST'>
                        <div class='division'>  
                            <input type='hidden' name='ud' value='".$ud."'>
                            <input type='hidden' name='closed' value='".$status."'>
                            <input type='hidden' name='acc' value='ACCEPTED'>
                        </div>
                        <div class='division'>  
                        <textarea name='details'class='details1' maxlength='3000' rows='9' title='10 characters minimum'></textarea>
                        <button class='submit' type='submit' name='submit'>SUBMIT</button>
                        </div>
                        </form>
                    </section>
                    <section >
                    </section>

            </section>
    </section>
    </section>";
            

            }
    

            ?>
    
</section>

</section>
</body>
</html>
