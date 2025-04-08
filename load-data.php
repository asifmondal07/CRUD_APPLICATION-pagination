<?php
include "db_connect.php";

 $sql = "SELECT * FROM `user`";
 $result=mysqli_query($conn,$sql);
 $output="";
 if(mysqli_num_rows($result)>0){
    $output='<table width="100%" cellspacing="0" my-10 cellpadding="0">
                <tr>
                    <th width="50px">ID</th>
                    <th width="200px">Name</th>
                    <th width="200px">Email</th>
                    <th width="100px">Phone</th>
                    <th width="130px">Date</th>
                    <th width="150px">Image1</th>
                    <th width="150px">Image2</th>
                    <th width="100px">Edit</th>
                    <th width="100px">Delete</th>
                </tr>  
            ';
 
            while($row=mysqli_fetch_assoc($result)){
                $output.="
                <tr>
                    <td>$row[id]</td>
                    <td>$row[name]</td>
                    <td>$row[email]</td>
                    <td>$row[phone]</td>
                    <td>$row[date]</td>
                    <td><img src='$row[image1]' height='90px' width'90px'></td>
                    <td><img src='$row[image2]' height='90px' width'90px'></td>
                    <td><button  class='btn btn-outline-success edit-btn'data-id='$row[id]'>Edit</button></td>
                    <td><button  class='btn btn-outline-danger delete-btn'data-id='$row[id]'>DELETE</button></td>     
                </tr>";
            }
    $output.='</table>';
    mysqli_close($conn);
    echo $output;
 }else{
    echo"No Data Here";
 }
 
?>                           