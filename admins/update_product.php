<?php
// These lines help catch the specific error causing the 500
ini_set('display_errors', 1);
error_reporting(E_ALL);
include_once('../config.php');

if(isset($_POST['btnupdate'])) {
    // Sanitize inputs to prevent SQL injection and errors
    $id    = mysqli_real_escape_string($conn, $_POST['proID']);
    $name  = mysqli_real_escape_string($conn, $_POST['txtname']);
    $size  = mysqli_real_escape_string($conn, $_POST['txtsize']);
    $price = mysqli_real_escape_string($conn, $_POST['txtprice']);
    $point = mysqli_real_escape_string($conn, $_POST['txtpoint']);

    $imgName = $_FILES['files']['name'];

    if($imgName != "") {
        $tmpName = $_FILES['files']['tmp_name'];
        // Ensure this folder exists and is writable
        move_uploaded_file($tmpName, "../images/" . $imgName); 

        // Use the EXACT column name from your DB (e.g., pro_ID or pro_id)
        $sql = "UPDATE tbl_product SET 
                pro_name = '$name', 
                size = '$size', 
                price = '$price', 
                point = '$point', 
                img = '$imgName' 
                WHERE pro_id = '$id'";
    } else {
        $sql = "UPDATE tbl_product SET 
                pro_name = '$name', 
                size = '$size', 
                price = '$price', 
                point = '$point' 
                WHERE pro_id = '$id'";
    }

    if(mysqli_query($conn, $sql)) {
        header("Location: index.php");
        exit(); // Always exit after a header redirect
    } else {
        echo "SQL Error: " . mysqli_error($conn);
    }
}
?>
