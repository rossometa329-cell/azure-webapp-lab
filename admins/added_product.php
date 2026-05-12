<?php
// 1. Enable Error Reporting (This stops the "500 Error" and shows the real problem)
error_reporting(E_ALL);
ini_set('display_errors', 1);

$folder = "../images/";

// 2. Get form inputs
$name  = $_POST['txtname']  ?? '';
$size  = $_POST['txtsize']  ?? '';
$price = $_POST['txtprice'] ?? '';
$point = $_POST['txtpoint'] ?? '';
$img   = 'default.png'; // Fallback image name

// 3. Handle file upload
if (isset($_FILES['files']) && $_FILES['files']['error'] === UPLOAD_ERR_OK) {
    $img = $_FILES['files']['name'];
    $tmp = $_FILES['files']['tmp_name'];

    if (!move_uploaded_file($tmp, $folder . $img)) {
        die("Error: Could not move uploaded file to $folder. Check folder permissions.");
    }
}

// 4. Database Connection
include_once('../config.php');

// 5. Secure Insert using Prepared Statements
// Note: Changed table name to 'cafebrown' to match your select.php
// 1. Add pro_id back to the column list
$sql = "INSERT INTO tbl_product (pro_id, pro_name, img, size, price, point) VALUES (NULL, ?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($conn, $sql);

if ($stmt) {
    // 2. Keep the 5 "s" and the 5 variables (pro_id is handled by the NULL in the string)
    mysqli_stmt_bind_param($stmt, "sssss", $name, $img, $size, $price, $point);
    
    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_close($stmt);
        include 'select.php'; 
    } else {
        echo "Execution Error: " . mysqli_stmt_error($stmt);
    }
}
mysqli_close($conn);
?>
