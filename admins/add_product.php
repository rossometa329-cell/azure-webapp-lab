<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Menu</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: Poppins, sans-serif;
           
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .form-box {
            background: #fff;
            padding: 30px 35px;
            width: 100%;
            max-width: 450px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        }

        h1 {
            text-align: center;
            margin-bottom: 25px;
            color: #333;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            font-weight: 600;
            display: block;
            margin-bottom: 6px;
            color: #444;
        }

        input, select {
            width: 100%;
            padding: 10px 12px;
            border-radius: 6px;
            border: 1px solid #ccc;
            outline: none;
            font-size: 15px;
        }

        input:focus, select:focus {
            border-color: #4f46e5;
            box-shadow: 0 0 5px rgba(79,70,229,0.4);
        }

        .btn-submit {
            width: 100%;
            padding: 12px;
            border: none;
            background: #4f46e5;
            color: #fff;
            font-size: 16px;
            border-radius: 6px;
            cursor: pointer;
            transition: 0.3s;
            margin-top: 10px;
        }

        .btn-submit:hover {
            background: #4338ca;
        }
    </style>
</head>

<body>

<div class="form-box">
    <h1>Add New Menu</h1>

    <form method="post" action="added_product.php" enctype="multipart/form-data">

        <div class="form-group">
            <label>Menu Name</label>
            <input type="text" name="txtname" placeholder="Enter menu name" required>
        </div>

        <div class="form-group">
            <label>Picture</label>
            <input type="file" name="files" required>
        </div>

        <div class="form-group">
            <label>Size</label>
            <select name="txtsize" required>
                <option value="">-- Select Size --</option>
                <option>Regular</option>
                <option>Large</option>
                <option>Small</option>
                <option>Grand</option>
            </select>
        </div>

        <div class="form-group">
            <label>Price</label>
            <input type="text" name="txtprice" placeholder="Enter price" required>
        </div>

        <div class="form-group">
            <label>Point</label>
            <input type="text" name="txtpoint" placeholder="Enter point" required>
        </div>

        <button type="submit" name="btnadd" class="btn-submit">
            Add Menu
        </button>

    </form>
</div>

</body>
</html>
