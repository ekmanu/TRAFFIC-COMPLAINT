<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $InvestID=$_SESSION["InvestID"];
    $query3= "SELECT * from assigned where InvestID='$InvestID'";
     $query_run = mysqli_query($conn,$query3);
     
     echo " <section class='whole'>
   <section id='admenu'>
   <div class='items'>
    <a href='./indexpage.php'><li class='child'><i class='fad fa-book '></i>ASSIGNED</li></a>
    <a href='../admin/register.php'><li><i class='fad fa-user'></i>REPORT</li></a>
    <a href='./logout2.php'><li><i class='fad fa-user'></i>LOG OUT</li></a>
    </div>
    </section>
     <section class='kuk'>
    <div class='messo'>  
                </div>
        <table>
             <thead>
                <tr>
                 <td>Complaint No.</td>
                 <td>Location</td>
                 <td>Date/Time</td>
                 <td></td>
                </tr>
                </thead>
            <tbody>
                         <tr>";
     if(mysqli_num_rows($query_run)>0)
     {
             foreach($query_run as $row){ 
            $_SESSION['POLICECOMPLAINTID']= $row['POLICECOMPLAINTID'];
            $_SESSION['BADGENO']= $row['BADGENO'];
            $_SESSION['IncidentDATE']= $row['IncidentDATE'];
            $_SESSION['CITY']= $row['CITY'];
            $_SESSION['STREET']= $row['STREET'];
            $_SESSION['IncidentDESC']= $row['IncidentDESC'];
            $_SESSION['MEDIA']= $row['MEDIA'];
           
           echo "<td>".$_SESSION['POLICECOMPLAINTID']."</td>
            <td>".$_SESSION['STREET'].",".$_SESSION['CITY']."</td>
            <td>".$_SESSION['IncidentDATE']."</td>
            <td><form action='editidd.php' method='post'>
                <input type='hidden' name='editd' value=".$_SESSION['POLICECOMPLAINTID'].">
                <button id='edit'class='field1' name='vbtn'>VIEW</button></form>
            </td>
         </tr>       
        ";}}
    
    ?>
    
</body>
</html>