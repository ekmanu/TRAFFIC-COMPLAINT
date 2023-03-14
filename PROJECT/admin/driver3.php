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
    <a href="./admcomplaints.php"><li ><i class="fad fa-book "></i>Complaints</li></a>
    <a href="./admdriver.php"><li><i class="fad fa-user"></i>Drivers</li></a>
    <a href="./admpolice.php"><li><i class="fas fa-user"></i>Police Officer</li></a>
    <a href="./admreport.php"><li><i class="fad fa-file"></i>Reports</li></a>
    <a href="./investigat.php"><li class="child"><i class="fas fa-user"></i>Investigators</li></a>
    <a href="./logoutad.php"><li><i ></i>LOG OUT</li></a>


    </div> 
</section>
<section class="kuk">
<table>
             <thead>
             <tr>
                 <td>Complaint No.</td>
                 <td>Complainant</td>
                 <td>Status</td>
                 <td></td>
             </tr>
        </thead>
        <tbody>
             <?php
            include '../includes/conn.php';
                $query3= "SELECT complaintdriver.DRIVERCOMPLAINTID, complaintdriver.USERID, users.firstname, users.secondname, complaintdriver.DCOMPSTATUS 
                FROM complaintdriver
                INNER JOIN users on complaintdriver.USERID=users.ID WHERE complaintdriver.DCOMPSTATUS='ACTIVE'";
                $query_run = mysqli_query($conn,$query3);
                if(mysqli_num_rows($query_run)>0)
                {
                    foreach($query_run as $items){
                        ?>
                         <tr>
                            <td><?= $items['DRIVERCOMPLAINTID']; ?></td>
                            <td><?= $items['firstname'],'&nbsp',$items['secondname'];?></td>
                            <td><?= $items['DCOMPSTATUS']; ?></td>
                            <td><form action="./driver32.php" method="post">
                                <input type="hidden" name="edit_id" value="<?php echo $items['DRIVERCOMPLAINTID']?>">
                                <input type="hidden" name="status" value="CLOSED">
                                <button id="edit" class="field1" name="editbtn">VIEW</button></form>
                            </td>

                         </tr>
                         

                         <?php
                        }
                        
                    }
                    else
                    {
                        echo "<div class='searchpara'>NO RECORD FOUND</div>";
                }
                
            
            ?>
           
        </tbody>
         </table>
</section>
        
    
</section>

</section>
</body>
</html>