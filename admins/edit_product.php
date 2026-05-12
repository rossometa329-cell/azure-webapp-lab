<?php
include '../config.php';

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM cafebrown WHERE pro_id=$id");
$row = mysqli_fetch_array($result);
?>

<form method="post" action="update_product.php">
    <input type="hidden" name="id" value="<?php echo $row['pro_id']; ?>">

    <input type="text" name="name" value="<?php echo $row['pro_name']; ?>"><br><br>
    <input type="text" name="price" value="<?php echo $row['price']; ?>"><br><br>
    <input type="text" name="point" value="<?php echo $row['point']; ?>"><br><br>

    <button type="submit">Update</button>
</form>
