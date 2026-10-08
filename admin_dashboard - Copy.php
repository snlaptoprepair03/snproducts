<?php

session_start();
include "db.php";

if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header("Location: admin_login.php");
    exit;
}

$result = mysqli_query($conn, "SELECT * FROM products ORDER BY id DESC");

if (!$result) {
    die("Product database error: " . mysqli_error($conn));
}

$totalProducts = mysqli_num_rows($result);

?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Dashboard - SN Laptop Repair</title>

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #111827, #374151);
            min-height: 100vh;
            padding: 25px;
        }

        .dashboard {
            max-width: 950px;
            margin: auto;
        }

        .header {
            background: white;
            border-radius: 20px;
            padding: 25px;
            text-align: center;
            margin-bottom: 25px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.25);
        }

        .logo {
            font-size: 38px;
            margin-bottom: 8px;
        }

        .header h1 {
            margin: 0;
            color: #111827;
            font-size: 30px;
        }

        .welcome {
            color: #6b7280;
            margin-top: 8px;
        }

        .stats {
            background: white;
            border-radius: 20px;
            padding: 30px;
            text-align: center;
            margin-bottom: 25px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.20);
        }

        .stats h2 {
            margin: 0;
            font-size: 50px;
            color: #ef4444;
        }

        .stats p {
            margin: 8px 0 0;
            color: #555;
            font-size: 17px;
            font-weight: bold;
        }

        .actions {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 18px;
        }

        .action {
            background: white;
            color: #111827;
            text-decoration: none;
            border-radius: 16px;
            padding: 25px 15px;
            text-align: center;
            font-size: 17px;
            font-weight: bold;
            box-shadow: 0 8px 20px rgba(0,0,0,0.18);
            transition: 0.2s;
        }

        .action:hover {
            transform: translateY(-5px);
        }

        .icon {
            display: block;
            font-size: 35px;
            margin-bottom: 10px;
        }

        .add {
            border-top: 5px solid #22c55e;
        }

        .manage {
            border-top: 5px solid #2563eb;
        }

        .website {
            border-top: 5px solid #f59e0b;
        }

        .logout {
            border-top: 5px solid #ef4444;
        }

        @media (max-width: 600px) {

            body {
                padding: 15px;
            }

            .actions {
                grid-template-columns: 1fr;
            }

            .header h1 {
                font-size: 24px;
            }

            .logo {
                font-size: 32px;
            }

        }

    </style>

</head>

<body>

<div class="dashboard">

    <div class="header">

        <div class="logo">💻🔧</div>

        <h1>SN Laptop Repair</h1>

        <p class="welcome">
            🔐 Admin Dashboard
        </p>

    </div>


    <div class="stats">

        <h2>
            <?php echo $totalProducts; ?>
        </h2>

        <p>
            📦 Total Products
        </p>

    </div>


    <div class="actions">

        <a href="add_product.php" class="action add">

            <span class="icon">➕</span>

            Add Product

        </a>


        <a href="index.php" class="action manage">

            <span class="icon">✏️</span>

            Manage Products

        </a>


        <a href="index.php" class="action website">

            <span class="icon">🌐</span>

            View Website

        </a>


        <a href="admin_logout.php" class="action logout">

            <span class="icon">🔓</span>

            Logout

        </a>

    </div>

</div>

</body>

</html>