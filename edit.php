<?php
include "db_connect.php";


$id=$_POST['id'];

$sql="SELECT * FROM `user` WHERE `id`=$id";
$result=mysqli_query($conn,$sql);
$output="";
    if(mysqli_num_rows($result)>0){

                while($row=mysqli_fetch_assoc($result)){
                    $output.="
                            <form id='edit-form' role='form' method='post' enctype='multipart/form-data'>
                                <div class='mb-3'>
                                    <label for='exampleInputName' class='form-label'>Enter Name</label>
                                    <input type='number' class='form-control ' hidden id='userid' name='userid' value='{$row["id"]}'>
                                    <input type='name' class='form-control ' id='new-name' name='new-name' value='{$row["name"]}'>                                                           
                                </div>

                                <div class='mb-3'>
                                    <label for='exampleInputName' class='form-label'>Enter Name</label>
                                    <input type='email' class='form-control ' id='new-email' name='new-email' value='{$row["email"]}'>                                                           
                                </div>

                                <div class='mb-3'>
                                    <label for='exampleInputName' class='form-label'>Enter Name</label>
                                    <input type='number' class='form-control ' id='new-phone' name='new-phone' value='{$row["phone"]}'>                                                           
                                </div>

                                <div class='mb-3'>
                                    <label for='exampleInputName' class='form-label'>Enter Name</label>
                                    <input type='date' class='form-control ' id='new-date' name='new-date' value='{$row["date"]}'>                                                           
                                </div>

                                <div class='mb-3'>
                                    <label for='exampleInputName' class='form-label'>Enter Name</label>
                                    <input type='file' class='form-control ' id='new-image1' name='new-image1' value='{$row["image1"]}'>                                                           
                                </div>

                                <div class='mb-3'>
                                    <label for='exampleInputName' class='form-label'>Enter Name</label>
                                    <input type='file' class='form-control ' id='new-image2' name='new-image2' value='{$row["image2"]}'>                                                           
                                </div>

                                <div class='modal-footer'>
                                    <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                                    <button type='button' id='update-data' class='btn btn-primary'>Save changes</button>
                                </div>
                            </form>";
                }
        
        mysqli_close($conn);
        echo $output;
    }else{
        echo"No Data Here";
    }

?>