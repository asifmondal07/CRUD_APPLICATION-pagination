<?php
include "db_connect.php";

// Number of records to show per page

$limit=3;

// Get the page number from POST, default is page 1

$page = isset($_POST['page']) ? (int)$_POST['page'] : 1;

$offset = ($page - 1) * $limit;

// Calculate the starting point for the records (offset)
$offset = ($page - 1) * $limit;

// Query to fetch records with LIMIT and OFFSET
$sql = "SELECT * FROM `user` LIMIT $limit OFFSET $offset";
$result = mysqli_query($conn, $sql);

 // Fetch total number of records for pagination calculation
$total_result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM `user`");
$total_rows = mysqli_fetch_assoc($total_result)['total'];
$total_pages = ceil($total_rows / $limit);

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
                    <td><img src='uploading/$row[image1]' height='90px' width'90px'></td>
                    <td><img src='uploading/$row[image2]' height='90px' width'90px'></td>
                    <td><button  class='btn btn-outline-success edit-btn'data-id='$row[id]'>Edit</button></td>
                    <td><button  class='btn btn-outline-danger delete-btn' data-id='$row[id]'>DELETE</button></td>     
                </tr>";
            }
    $output.='</table>';

    // Add pagination controls
    $output .= '<div class="pagination">';

    // Previous button
    if ($page > 1) {
        $prev_page = $page - 1;
        $output .= "<a href='#' class='page-link' data-page='$prev_page'>Previous</a> ";
    }

    /// Page number links
    for ($i = 1; $i <= $total_pages; $i++) {
        if ($i == $page) {
            $output .= "<strong>$i</strong> ";
        } else {
            $output .= "<a href='#' class='page-link' data-page='$i'>$i</a> ";
        }
    }

    // Next page button (only show if we are not on the last page)
    if ($page < $total_pages) {
        $next_page = $page + 1;
        $output .= "<a href='#' class='page-link' data-page='$next_page'>Next</a>";
    }

    $output .= '</div>';

    mysqli_close($conn);

    echo $output;
 }else{
    echo"No Data Here";
 }
 
?>                           