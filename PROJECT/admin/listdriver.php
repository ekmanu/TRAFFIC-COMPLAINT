<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="./admin.css">
    
   
    <link href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" rel="stylesheet">
</head>
<body>
<section>
<?php include ('../headers/header2.php');
session_start();

?>


</section>

<section class="whole">
<section id="admenu">
    <div class="items">
    <a href="./admin.php"><li><i class="fad fa-rocket"></i>Dashboard</li></a>
    <a href="./users.php"><li><i class="fad fa-user-circle"></i>Users</li></a>
    <a href="./admcomplaints.php"><li><i class="fad fa-book "></i>Complaints</li></a>
    <a href="./admdriver.php"><li class="child"><i class="fad fa-user"></i>Drivers</li></a>
    <a href="./admpolice.php"><li><i class="fas fa-user"></i>Police Officer</li></a>
    <a href="./admreport.php"><li><i class="fad fa-file"></i>Reports</li></a>
    <a href="./investigat.php"><li><i class="fas fa-user"></i>Investigators</li></a>
    <a href="./logoutad.php"><li><i ></i>LOG OUT</li></a>

    </div> 
</section>
<section class="kuk">
<table>
             <thead>
             <tr>
                 <td>Name</td>
                 <td>ID</td>
                 <td>EMAIL</td>
                 <td>CAR REG</td>
                 <td>CAR MAKE</td>
                 <td>RESIDENCE</td>
                 <td></td>
             </tr>
        </thead>
        <tbody>
             <?php
            include '../includes/conn.php';
                $query3= "SELECT CARREG,OWNERNAME,OWNERID,CONTACT,EMAIL,CARMAKE,CARTYPE,COLOUR,RESIDENCE from driver";
                $query_run = mysqli_query($conn,$query3);
                if(mysqli_num_rows($query_run)>0)
                {
                    foreach($query_run as $items){
                        ?>
                         <tr>
                            <td class="people">
                            <div class="people-de">
                                <h5><?= $items['OWNERNAME'];?></h5>
                                <P><?= $items['CONTACT']; ?></P>
                            </div>
                        
                        </td>
                            <td><?= $items['OWNERID']; ?></td>
                            <td><?= $items['EMAIL']; ?></td>
                            <td><?= $items['CARREG']; ?></td>
                            <td class="people">
                                <h5><?= $items['COLOUR']?></h5>&nbsp;
                                <h5><?= $items['CARMAKE'] ." ". $items['CARTYPE'];?></h5>
                                
    
                        
                        </td>
                            <td><?= $items['RESIDENCE']; ?></td>
                            <td> <form action="editdriver.php" method="post">
                                <input type="hidden" name="edit_id" value="<?php echo $items['OWNERID']?>">
                                <input type="hidden" name="finame" value="<?php echo $items['OWNERNAME']?>">
                                <input type="hidden" name="colour" value="<?php echo $items['COLOUR']?>">
                                <input type="hidden" name="phono" value="<?php echo $items['CONTACT']?>">
                                <input type="hidden" name="MAIL" value="<?php echo $items['EMAIL']?>">
                                <input type="hidden" name="ema" value="<?php echo $items['CARMAKE']?>">
                                <input type="hidden" name="reg" value="<?php echo $items['CARREG']?>">
                                <input type="hidden" name="type" value="<?php echo $items['CARTYPE']?>">
                                <input type="hidden" name="res" value="<?php echo $items['RESIDENCE']?>">
                                <button id="edit" class="field1" name="editbtn">EDIT</button>
                                <button id="edit" class="field1" name="DELETE">DELETE</button>
                            </form>
                            </td>

                         </tr>
                         

                         <?php
                        }
                        
                    }
                    else
                    {
                        header("location: ./pendingsearch.php?error=problem");
                }
                
            
            ?>
           
        </tbody>
         </table>
</section>
        
    
</section>

</section>
</body>
</html>