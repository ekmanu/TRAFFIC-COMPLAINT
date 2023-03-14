<?php
$target_dir = "./images/";
$image= $_FILES[$photo]['name'];
$tmp= $_FILES[$photo]['tmp_name'];
$target_file = $target_dir . basename($image);
// $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));



if (file_exists($target_file)) {
    header("location: ../signup.php?error=imageexists");
}


if ($_FILES[$photo]["size"] > 500000) {
    header("location: ../signup.php?error=photolarge");
}


// if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
//     header("location: ../signup.php?error=notallowed");
// }

$mov = "INSERT INTO users(photo) VALUES ('$image')";

$in = mysqli_query($conn,$image);

if ($in){
move_uploaded_file($tmp, $target_file, "$image");
}

  if (!move_uploaded_file($_FILES[$photo]['tmp_name'], $target_file)) {
    header("location: ../signup.php?error=picnotposted");
    
  }

?>