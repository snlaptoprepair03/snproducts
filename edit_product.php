<?php

session_start();
include "db.php";

if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header("Location: admin_login.php");
    exit;
}

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$id = (int) $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM products WHERE id = $id");
$product = mysqli_fetch_assoc($result);

if (!$product) {
    echo "Product not found.";
    exit;
}

$message = "";

if (isset($_POST['update_product'])) {

    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    $imageName = $product['image'];

    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {

        $imageName = time() . "_" . basename($_FILES['image']['name']);

        $uploadPath = "uploads/" . $imageName;

        move_uploaded_file($_FILES['image']['tmp_name'], $uploadPath);
    }

    $sql = "UPDATE products SET
            name='$name',
            description='$description',
            price='$price',
            image='$imageName'
            WHERE id=$id";

    if (mysqli_query($conn, $sql)) {

        header("Location: index.php");
        exit;

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

    <title>Edit Product - SN Laptop Repair</title>

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
            background: #fee2e2;
            color: #991b1b;
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

        .current-image {
            text-align: center;
            margin-bottom: 20px;
        }

        .current-image img {
            width: 150px;
            height: 150px;
            object-fit: contain;
            border-radius: 12px;
            border: 1px solid #ddd;
            padding: 5px;
        }

        .update-btn {
            width: 100%;
            border: none;
            padding: 15px;
            border-radius: 10px;
            background: #2563eb;
            color: white;
            font-size: 17px;
            font-weight: bold;
            cursor: pointer;
        }

        .update-btn:hover {
            background: #1d4ed8;
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

            <div class="icon">✏️📦</div>

            <h1>Edit Product</h1>

            <p>SN Laptop Repair — Admin Panel</p>

        </div>


        <?php if ($message != "") { ?>

            <div class="message">
                <?php echo $message; ?>
            </div>

        <?php } ?>


        <?php if (!empty($product['image'])) { ?>

            <div class="current-image">

                <p><strong>Current Product Image</strong></p>

                <img
                    src="uploads/<?php echo htmlspecialchars($product['image']); ?>"
                    alt="Product Image"
                >

            </div>

        <?php } ?>


        <form method="POST" enctype="multipart/form-data">

            <label>Product Name</label>

            <input
                type="text"
                name="name"
                value="<?php echo htmlspecialchars($product['name']); ?>"
                required
            >


            <label>Description</label>

            <textarea
                name="description"
                required
            ><?php echo htmlspecialchars($product['description']); ?></textarea>


            <label>Price (Rs.)</label>

            <input
                type="number"
                name="price"
                value="<?php echo htmlspecialchars($product['price']); ?>"
                required
            >


            <label>Change Product Image (Optional)</label>

            <input
                type="file"
                name="image"
                accept="image/*"
            >


            <button
                type="submit"
                name="update_product"
                class="update-btn"
            >
                💾 Update Product
            </button>

        </form>


        <a href="admin_dashboard.php" class="back">
            ← Back to Dashboard
        </a>

    </div>

</div>

</body>

</html>