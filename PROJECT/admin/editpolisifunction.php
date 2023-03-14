<?php
if(isset($_POST['submit']))
{
    include ('../includes/conn.php');
    $ids = $_POST['ID2'];
    $ids1 = $_POST['ID3'];
    $first = $_POST['funame'];
    $second = $_POST['siname'];
    $number = $_POST['phone'];
    $eadd = $_POST['station'];
    $res = $_POST['res'];
    $ma2 = $_POST['mail'];
    $send= "UPDATE policeofficer set BADGENO= ?, FULLNAME=?, secondname=?, PhoneNumber=?,EMAIL=?,POLICESTATION=?,RESIDENCE=? where BADGENO= ? ";
     $chick = mysqli_stmt_init($conn);
     if(mysqli_stmt_prepare($chick, $send)){
        mysqli_stmt_bind_param($chick, "issssssi", $ids,$first,$second,$number,$ma2,$eadd,$res,$ids1);
        mysqli_stmt_execute($chick);
        mysqli_stmt_close($chick);
        header("location: ./admpolice.php?error=updated");
     }else{
        header("location: ./admpolice.php?error=notupdated");
     }

}

?>