<?php
include '../config.php';

$id = $_GET['id'];

$sql = "DELETE FROM tbl_product WHERE pro_id = $id";
mysqli_query($conn, $sql);

header("Location: select.php"); // back to product list
?>
