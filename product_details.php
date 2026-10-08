<?php
include "db.php";

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
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo htmlspecialchars($product['name']); ?> - SN Laptop Repair</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f3f4f6;
            margin: 0;
            padding: 30px 15px;
        }

        .details-card {
            max-width: 700px;
            margin: 30px auto;
            background: white;
            padding: 25px;
            border-radius: 18px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.10);
            text-align: center;
        }

        .details-image {
            width: 100%;
            max-width: 450px;
            max-height: 400px;
            object-fit: contain;
            border-radius: 12px;
        }

        h1 {
            margin-top: 20px;
        }

        .description {
            color: #6b7280;
            line-height: 1.6;
        }

        .price {
            font-size: 24px;
            font-weight: bold;
            margin: 15px 0;
            color: #ef4444;
        }

        .order-btn,
        .back-btn {
            display: inline-block;
            padding: 12px 20px;
            margin: 5px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
        }

        .order-btn {
            background: #16a34a;
            color: white;
        }

        .back-btn {
            background: #111827;
            color: white;
        }
    </style>
</head>

<body>

<div class="details-card">

    <?php if (!empty($product['image'])) { ?>
        <img
            class="details-image"
            src="uploads/<?php echo htmlspecialchars($product['image']); ?>"
            alt="<?php echo htmlspecialchars($product['name']); ?>"
        >
    <?php } ?>

    <h1><?php echo htmlspecialchars($product['name']); ?></h1>

    <p class="description">
        <?php echo htmlspecialchars($product['description']); ?>
    </p>

    <div class="price">
        Rs. <?php echo htmlspecialchars($product['price']); ?>
    </div>

    <a
        class="order-btn"
        target="_blank"
        href="https://wa.me/9779761118109?text=<?php echo urlencode('Hello SN Laptop Repair! I want to order: ' . $product['name'] . ' - Rs. ' . $product['price']); ?>"
    >
        🟢 Order on WhatsApp
    </a>

    <a href="index.php#products" class="back-btn">
        ← Back to Products
    </a>

</div>

</body>
</html>