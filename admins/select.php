<!DOCTYPE html>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

<html>
<head>
    <title>Product List</title>
    <style>
        body {
            font-family: Poppins, sans-serif;
            background: #f4f6f9;
            padding: 30px;
        }

        .container {
            background: #ffffff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
            max-width: 1100px;
            margin: auto;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .add-btn {
            display: inline-block;
            padding: 10px 18px;
            background: #4f46e5;
            color: #fff;
            text-decoration: none;
            border-radius: 6px;
            margin-bottom: 15px;
            transition: 0.3s;
        }

        .add-btn:hover {
            background: #4338ca;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px;
            text-align: center;
        }

        th {
            background: #4f46e5;
            color: white;
        }

        tr:nth-child(even) {
            background: #f3f4f6;
        }

        tr:hover {
            background: #e0e7ff;
        }

        img {
            border-radius: 8px;
            object-fit: cover;
        }

        .edit-btn {
            background: #22c55e;
            color: white;
            padding: 6px 12px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 14px;
            margin-right: 5px;
        }

        .delete-btn {
            background: #ef4444;
            color: white;
            padding: 6px 12px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 14px;
        }

        .edit-btn:hover { background: #16a34a; }
        .delete-btn:hover { background: #dc2626; }
    </style>
</head>

<body>

<div class="container">
    <h2>Product Menu List</h2>

    <a href="add_product.php" class="add-btn">+ Insert New Menu</a>

    <table>
        <tr>
            <th>ID</th>
            <th>Menu Name</th>
            <th>Photo</th>
            <th>Price</th>
            <th>Point</th>
            <th>Action</th>
        </tr>

        <?php
        include '../config.php';
        $sql = "SELECT * FROM `tbl_product`";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_array($result)) {
        ?>
        <tr>
            <td><?php echo $row['pro_id']; ?></td>
            <td><?php echo $row['pro_name']; ?></td>
            <td>
                <img src="../images/<?php echo $row['img']; ?>" width="80">
            </td>
            <td>$<?php echo $row['price']; ?></td>
            <td><?php echo $row['point']; ?></td>
            <td>
                <a href="edit_product.php?id=<?php echo $row['pro_id']; ?>" class="edit-btn">Edit</a>
                <a href="delete_product.php?id=<?php echo $row['pro_id']; ?>" 
                   class="delete-btn"
                   onclick="return confirm('Are you sure you want to delete this item?')">
                   Delete
                </a>
            </td>
        </tr>
        <?php } ?>
    </table>
</div>

</body>
</html>
