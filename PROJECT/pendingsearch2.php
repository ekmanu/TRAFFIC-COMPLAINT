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
                <h1>PENDING COMPLAINTS</h1>
            </div>
        </div>
     </div>
     <div class="words"><span>BELOW IS A LIST OF POLICE PENDING COMPLAINTS:</span></div>
     <div class="search">
         <form action="" method="GET">
             <div class="febox">
                   <button name="complaint" id="complaint" class="field1 "><a href="./pendingsearch.php" class="link "> DRIVER COMPLAINT</a></button>
                 <button name="complaint" id="complaint" class="field1 activee"><a href="./pendingsearch2.php" class="link "> POLICE COMPLAINT</a></button>
             </div>
         </form>
         </div>
         <div class="searchpara">
             <?php
             if(isset($_GET["error"])){
                if ($_GET["error"] == "problem"){

                   echo "NO RECORD FOUND";
                }
            }
             ?>
             </div>
         <table>
             <thead>
             <tr>
                 <th>COMPLAINT</th>
                 <th>BADGENO</th>
                 <th>DATE</th>
                 <th>STREET</th>
                 <th>CITY </th>
                 <th>DESCRIPTION</th>
             </tr>
        </thead>
        <tbody>
            <?php
            require './includes/conn.php';
                $query3= "SELECT POLICECOMPLAINTID,BADGENO,IncidentDATE,CITY,STREET,IncidentDESC,USERID,PCOMPSTATUS from complaintpolice WHERE USERID=$filter and PCOMPSTATUS='PENDING'";
                $query_run = mysqli_query($conn,$query3);
                if(mysqli_num_rows($query_run)>0)
                {
                    foreach($query_run as $items){
                        ?>
                         <tr>
                            <td><?= $items['POLICECOMPLAINTID']; ?></td>
                            <td><?= $items['BADGENO']; ?></td>
                            <td><?= $items['IncidentDATE']; ?></td>
                            <td><?= $items['STREET']; ?></td>
                            <td><?= $items['CITY']; ?></td>
                            <td><?= $items['IncidentDESC']; ?></td>
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
       

</body>
</html>