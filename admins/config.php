<?php
include("config.php");
$server='localhost';
$user='root';
$pws='1234';
$db='db_coffee';

$conn=mysqli_connect($server,$user,$pws);
$sql=mysqli_select_db($conn,$db);
if(!$conn){
    echo "Connected failed ";
}
?>
