<?php
if(isset($_POST['submit']))
{
    include ('../includes/conn.php');
    $ids = $_POST['ID2'];
    $ids1 = $_POST['ID3'];
    $first = $_POST['funame'];
    $second = $_POST['siname'];
    $number = $_POST['phone'];
    $eadd = $_POST['address'];
    $send= "UPDATE users set ID= ?, firstname=?, secondname=?, phonenumber=?,emailaddress=? where ID= ? ";
     $chick = mysqli_stmt_init($conn);
     if(mysqli_stmt_prepare($chick, $send)){
        mysqli_stmt_bind_param($chick, "issssi", $ids,$first,$second,$number,$eadd,$ids1);
        mysqli_stmt_execute($chick);
        mysqli_stmt_close($chick);
        header("location: ./users.php");
     }else{
        header("location: ./assign.php?error=notassigned");
     }

}

?>