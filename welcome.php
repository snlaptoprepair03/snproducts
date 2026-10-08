<!DOCTYPE html>
<html>
<head>
    <title>Welcome - SN Laptop Repair</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #111827;
            color: white;
            text-align: center;
        }

        .welcome {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 20px;
            box-sizing: border-box;
        }

        .welcome h1 {
            font-size: 38px;
            margin-bottom: 10px;
        }

        .site-logo {
    width: 150px;
    height: 150px;
    object-fit: contain;
    margin-bottom: 15px;
}
            .welcome p {
            font-size: 18px;
            color: #d1d5db;
            margin-bottom: 35px;
        }

        .welcome button {
            width: 280px;
            padding: 15px;
            margin: 8px;
            border: none;
            border-radius: 10px;
            font-size: 17px;
            font-weight: bold;
            cursor: pointer;
        }

        .customer {
            background: #ef4444;
            color: white;
        }

        .admin {
            background: white;
            color: #111827;
        }

        .welcome button:hover {
            opacity: 0.9;
        }
    </style>
</head>

<body>

<div class="welcome">

    <img src="logo.png" class="site-logo">

    <h1>SN Laptop Repair</h1>

    <p>Welcome to SN Laptop Repair</p>

    <button class="customer"
        onclick="window.location.href='home.php'">
        👤 Continue as Customer
    </button>

    <button class="admin"
        onclick="window.location.href='admin_login.php'">
        🔐 Login as Admin
    </button>

</div>

</body>
</html>