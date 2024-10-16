<?php

include "db_connect.php";



    

   
    $userid = $_POST['userid'] ?? '';
    $name = $_POST['new-name'] ?? '';
    $phone = $_POST['new-phone'] ?? '';
    $date = $_POST['new-date'] ?? '';
        
        
        $image1 = '';
        $image2 = '';

        $sts="SELECT * FROM `user` WHERE `id`='$userid'";
        $result = mysqli_query($conn, $sts);
        if (!$result) {
            echo "SQL Error: " . mysqli_error($conn);
            exit();
        }
    
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $image1 = $row["image1"];
            $image2 = $row["image2"];
        } else {
            echo "No user found with ID $userid";
            exit();
        }
         
        // Handle image upload if a new file is uploaded
        if (!empty($_FILES['new-image1']['name'])) {
            $target_dir = "uploading/";
            $target_file1 = $target_dir . basename($_FILES["new-image1"]["name"]);
            if (move_uploaded_file($_FILES["new-image1"]["tmp_name"], $target_file1)) {
                $image1 = $target_file1;
            }
        }

        if (!empty($_FILES['new-image2']['name'])) {
            $target_dir = "uploading/";
            $target_file2 = $target_dir . basename($_FILES["new-image2"]["name"]);
            if (move_uploaded_file($_FILES["new-image2"]["tmp_name"], $target_file2)) {
                $image2 = $target_file2;
            }
        }
    

    $sql = "UPDATE `user` SET `name`='$name', `phone`='$phone', `date`='$date',`image1`='$image1',`image2`='$image2'    WHERE `id`='$userid'";
    
    if(mysqli_query($conn,$sql)){
        echo 1 ;
        
    }else{
        echo 0;
    }


?>