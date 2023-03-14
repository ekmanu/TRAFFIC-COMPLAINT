<?php
if(isset($_POST['submit']))
{
    include ('../includes/conn.php');
    $ids = $_POST['ID2'];
    $ids1 = $_POST['ID3'];
    $first = $_POST['funame'];
    $mako = $_POST['mako'];
    $typo = $_POST['typo'];
    $number = $_POST['phone'];
    $regi = $_POST['regi'];
    $res = $_POST['res'];
    $ma2 = $_POST['mail'];
    $colours = $_POST['colour'];
    $send= "UPDATE driver set OWNERNAME= ?, OWNERID=?, CONTACT=?, EMAIL=?,CARREG=?,CARRMAKE=?,CARTYPE,COLOUR=?,RESIDENCE=? where OWNERID= ? ";
     $chick = mysqli_stmt_init($conn);
     if(mysqli_stmt_prepare($chick, $send)){
        mysqli_stmt_bind_param($chick, "sisssssssi",$first, $ids,$number,$ma2,$regi,$mako,$typo,$colours,$res,$ids1);
        mysqli_stmt_execute($chick);
        mysqli_stmt_close($chick);
        header("location: ./admpolice.php?error=updated");
     }else{
        header("location: ./admpolice.php?error=notupdated");
     }

}

?>