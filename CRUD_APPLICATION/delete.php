<?php
include "db_connect.php";


$id=$_POST['id'];
                     //DELETE image in Local disk
$sql1="SELECT * FROM user WHERE id=$id";
$result=mysqli_query($conn,$sql1);

if($row=mysqli_fetch_assoc($result)){

   $image_path1="uploading/".$row['image1'];
   $image_path2="uploading/".$row['image2'];
   

    if(file_exists($image_path1) && file_exists($image_path2)){
        unlink($image_path1);
        unlink($image_path2);
    }    
}
            //DELETE image in database
 $sql="DELETE FROM user WHERE id = $id";
 if(mysqli_query($conn,$sql)){
    echo 1;
 }else{
    echo 0;
 }

?>