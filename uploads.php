<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['first-name'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $date = $_POST['date'] ?? '';


    // Initialize variables
    $image_des1 = $image_des2 = '';
    $upload_dir = 'uploading/';
    if (!file_exists($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    // // Handle multiple file uploads
    // $targetDir = "uploads/";
    // $uploadedFiles = [];
    
    // foreach ($_FILES['files']['tmp_name'] as $key => $tmp_name) {
    //     $fileName = basename($_FILES["files"]["name"][$key]);
    //     $uniqueName = uniqid() . "_" . $fileName;
    //     $targetFile = $targetDir . $uniqueName;
    //     $uploadedFiles[] = $targetFile;
        
    //     if (!move_uploaded_file($tmp_name, $targetFile)) {
    //         echo "File '{$fileName}' upload failed.<br>";
    //     } else {
    //         echo "File '{$fileName}' uploaded successfully.<br>";
    //     }
    // }
    
    // // Convert array of files to comma-separated string for database
    // $filesDorDb = implode(',', $uploadedFiles);

    // File upload handling
    $image_des1 = handle_file_upload($_FILES['img1'], $upload_dir);
    if (strpos($image_des1, "Error") !== false) {
        echo $image_des1;
        exit;
    }

    $image_des2 = handle_file_upload($_FILES['img2'], $upload_dir);
    if (strpos($image_des2, "Error") !== false) {
        echo $image_des2;
        exit;
    }
    // Include database connection
    include 'db_connect.php';

    $sts="SELECT * FROM `user` WHERE `email` = '$email'";
    $result=mysqli_query($conn,$sts);
    if ($result->num_rows > 0) {
        echo "Email already exists";
        $conn->close();
        exit;
    }


    // Prepare and bind
    $sql = "INSERT INTO `user` (`name`, `email`, `phone`, `date`, `image1`, `image2`) VALUES ('$first_name', '$email', '$phone', '$date', '$image_des1', '$image_des2')";
    
    if ($conn->query($sql) === TRUE) {
        echo  "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    // Close connection
    $conn->close();

    
}
?>
