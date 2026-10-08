<?php

session_start();

if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header("Location: admin_login.php");
    exit;
}

include "db.php";

$message = "";

if (isset($_POST['add_product'])) {

    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $imageName = "";

    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {

        $imageName = time() . "_" . basename($_FILES['image']['name']);

        $uploadPath = "uploads/" . $imageName;

        move_uploaded_file($_FILES['image']['tmp_name'], $uploadPath);
    }

    $sql = "INSERT INTO products (name, description, price, image)
            VALUES ('$name', '$description', '$price', '$imageName')";

    if (mysqli_query($conn, $sql)) {

        $message = "Product added successfully!";

    } else {

        $message = "Error: " . mysqli_error($conn);

    }
}

?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Product - SN Laptop Repair</title>

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 25px;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #111827, #374151);
            min-height: 100vh;
        }

        .container {
            max-width: 650px;
            margin: auto;
        }

        .card {
            background: white;
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 10px 35px rgba(0,0,0,0.25);
        }

        .header {
            text-align: center;
            margin-bottom: 25px;
        }

        .header .icon {
            font-size: 45px;
        }

        .header h1 {
            margin: 10px 0 5px;
            color: #111827;
        }

        .header p {
            color: #6b7280;
            margin: 0;
        }

        .message {
            background: #dcfce7;
            color: #166534;
            padding: 12px;
            border-radius: 10px;
            text-align: center;
            margin-bottom: 20px;
            font-weight: bold;
        }

        label {
            display: block;
            margin-bottom: 7px;
            font-weight: bold;
            color: #374151;
        }

        input,
        textarea {
            width: 100%;
            padding: 13px;
            border: 1px solid #d1d5db;
            border-radius: 10px;
            font-size: 15px;
            margin-bottom: 18px;
            outline: none;
        }

        input:focus,
        textarea:focus {
            border-color: #2563eb;
        }

        textarea {
            min-height: 110px;
            resize: vertical;
        }

        input[type="file"] {
            background: #f9fafb;
            padding: 10px;
        }

        .add-btn {
            width: 100%;
            border: none;
            padding: 15px;
            border-radius: 10px;
            background: #111827;
            color: white;
            font-size: 17px;
            font-weight: bold;
            cursor: pointer;
        }

        .add-btn:hover {
            background: #2563eb;
        }

        .back {
            display: block;
            text-align: center;
            margin-top: 15px;
            padding: 12px;
            background: #f3f4f6;
            color: #111827;
            text-decoration: none;
            border-radius: 10px;
            font-weight: bold;
        }

        @media (max-width: 600px) {

            body {
                padding: 15px;
            }

            .card {
                padding: 20px;
            }

            .header h1 {
                font-size: 24px;
            }

        }

    </style>

</head>

<body>

<div class="container">

    <div class="card">

        <div class="header">

            <div class="icon">➕📦</div>

            <h1>Add New Product</h1>

            <p>SN Laptop Repair — Admin Panel</p>

        </div>


        <?php if ($message != "") { ?>

            <div class="message">
                <?php echo $message; ?>
            </div>

        <?php } ?>


        <form method="POST" enctype="multipart/form-data">

            <label>Product Name</label>

            <input
                type="text"
                name="name"
                placeholder="e.g. Laptop Cooler"
                required
            >


            <label>Description</label>

            <textarea
                name="description"
                placeholder="Write product description..."
                required
            ></textarea>


            <label>Price (Rs.)</label>

            <input
                type="number"
                name="price"
                placeholder="e.g. 1200"
                required
            >


            <label>Product Image</label>

            <input
                type="file"
                name="image"
                accept="image/*"
                required
            >


            <button
                type="submit"
                name="add_product"
                class="add-btn"
            >
                ➕ Add Product
            </button>

        </form>


        <a href="admin_dashboard.php" class="back">
            ← Back to Dashboard
        </a>

    </div>

</div>

</body>

</html>