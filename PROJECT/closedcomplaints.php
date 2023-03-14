<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="stylesheet" href="./styles.css">
    <link rel="stylesheet" href="./complaintsform.css">
    <link rel="stylesheet" href="./search.css">
</head>
<body>
<?php
include ('./mail.php');
include ('./headers/header.php');
$filter=$_SESSION['USERID'];

?>
     <div class="page2">
           <div class="compl">
             <div class="page">
                <h1>CLOSED COMPLAINTS</h1>
            </div>
        </div>
     </div>
     <div class="words"><span>BELOW IS A LIST OF MOTORIST/BIKER CLOSED COMPLAINTS:</span></div>
     <div class="search">
         <form action="" method="POST">
             <div class="febox">
                   <button name="complaint" id="complaint" class="field1 activee "><a href="./closedcomplaints.php" class="link "> DRIVER COMPLAINT</a></button>
                 <button name="complaint" id="complaint" class="field1"><a href="./closedcomplaints2.php" class="link "> POLICE COMPLAINT</a></button>
             </div>
         </form>
         </div>
         <div class="searchpara">
             </div>
         <table>
             <thead>
             <tr>
                 <th>COMPLAINT</th>
                 <th>CAR REGISTRATION</th>
                 <th>DATE</th>
                 <th>STREET</th>
                 <th>CITY </th>
                 <th>DESCRIPTION</th>
                 <th></th>
             </tr>
        </thead>
        <tbody>
            <?php
            require './includes/conn.php';
                $query= "SELECT DRIVERCOMPLAINTID,CARREG,IncidentDATE,CITY,STREET,IncidentDESC,USERID,DCOMPSTATUS from complaintdriver WHERE USERID=$filter and DCOMPSTATUS='CLOSED'";
                $query_run = mysqli_query($conn,$query);
                if(mysqli_num_rows($query_run)>0)
                {
                    foreach($query_run as $items){
                        ?>
                         <tr>
                            <td><?= $items['DRIVERCOMPLAINTID']; ?></td>
                            <td><?= $items['CARREG']; ?></td>
                            <td><?= $items['IncidentDATE']; ?></td>
                            <td><?= $items['STREET']; ?></td>
                            <td><?= $items['CITY']; ?></td>
                            <td><?= $items['IncidentDESC']; ?></td>
                           <form action="./admin/folders/driverfinalpdf.php" method="POST">
                           <input type="hidden" name="edit_id" value="<?php echo $items['DRIVERCOMPLAINTID']?>">
                               <td><button name="editbtn" id="complaint" class="field1">VIEW REPORT</button></form>
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
    
     </div>

</body>
</html>