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

    // Function to get the next available filename (increments the number in the name)
    function get_next_filename($upload_dir, $file) {
        $path_info = pathinfo($file['name']);
        $filename = $path_info['filename']; // original file name without extension
        $extension = $path_info['extension']; // file extension

        $counter = 1;
        $new_name = $filename . "_" . $counter . "." . $extension;

        // Keep incrementing the counter until an available file name is found
        while (file_exists($upload_dir . $new_name)) {
            $counter++;
            $new_name = $filename . "_" . $counter . "." . $extension;
        }

        return $new_name;
    }
     // Function to handle file upload
     function handle_file_upload($file, $upload_dir) {
        // Get the next available filename
        $new_image_name = get_next_filename($upload_dir, $file);
        $image_dest = $upload_dir . $new_image_name;

        if (!move_uploaded_file($file['tmp_name'], $image_dest)) {
            return "Failed to move uploaded file.";
        }

        return $new_image_name; // Return the final name used for the file
    }


    // // Function to handle file upload
    // function handle_file_upload($file, $upload_dir) {
    //     if ($file['error'] != 0) {
    //         return "Error with file upload: " . $file['error'];
    //     }

    //     $image_name = basename($file['name']);
    //     $image_dest = $upload_dir . $image_name;

    //     if (!move_uploaded_file($file['tmp_name'], $image_dest)) {
    //         return "Failed to move uploaded file.";
    //     }

    //     return $image_dest;
    // }

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
