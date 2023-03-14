
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="../admin/admin.css">
    <link href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" rel="stylesheet">
</head>
<body>
<?php include ('../headers/header2.php');

session_start();

?>
<section class="whole">
<section id="admenu">
   <div class='items'>
    <a href='./indexpage.php'><li class='child'><i class='fad fa-book '></i>ASSIGNED</li></a>
    <a href='../admin/register.php'><li><i class='fad fa-user'></i>REPORT</li></a>
    <a href='./logout2.php'><li><i class='fad fa-user'></i>LOG OUT</li></a>
    </div>
    </div> 
</section>
 <?php

            if(isset($_POST['accept'])){
                $ud = $_POST['editable'];
                echo " <section class='kuk'>
                <section class='sidepage'>
                    <div class='headie'>
                        <div class='top'>
                            <h3>WRITE DETAILED RESULTS OF THE COMPLAINT:</h3>
                        </div>
                        <section class='rest'>
                                <section class='part1'>
                                    <form action='policeassignment.php' method='POST'>
                                    <div class='division'>  
                                        <input type='hidden' name='editable' value='".$ud."'>
                                        <input type='hidden' name='ACCEPTED' value='ACCEPTED'>
                                    </div>
                                    <div class='division'>  
                                    <textarea name='info'class='details1' maxlength='3000' rows='9' title='10 characters minimum'></textarea>
                                    <button class='submit' type='submit' name='accept'>SUBMIT</button>
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
