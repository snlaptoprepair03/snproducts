<?php

session_start();

$error = "";

$admin_password_hash = '$2y$10$ukwi.THzK7Sntn3b5EjdSepOXOGLrZtuGpioUxNfk3J.KpZtDiUdK';

if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

   if ($username === "somethingsn28@gmail.com" && password_verify($password, $admin_password_hash)) {

   session_regenerate_id(true);
     
   $_SESSION['admin'] = true;

        header("Location: admin_dashboard.php");
        exit;

    } else {

        $error = "Invalid Gmail or password.";

    }
}

?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Login - SN Laptop Repair</title>

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 20px;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #111827, #374151);
            min-height: 100vh;

            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-card {
            width: 100%;
            max-width: 430px;
            background: white;
            padding: 35px;
            border-radius: 22px;
            box-shadow: 0 15px 40px rgba(0,0,0,0.3);
        }

        .logo {
            text-align: center;
            font-size: 55px;
            margin-bottom: 10px;
        }

        h1 {
            text-align: center;
            margin: 0;
            color: #111827;
            font-size: 27px;
        }

        .subtitle {
            text-align: center;
            color: #6b7280;
            margin: 8px 0 28px;
        }

        .error {
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

        input {
            width: 100%;
            padding: 14px;
            border: 1px solid #d1d5db;
            border-radius: 10px;
            font-size: 15px;
            margin-bottom: 18px;
            outline: none;
        }

        input:focus {
            border-color: #2563eb;
        }

        .login-btn {
            width: 100%;
            padding: 15px;
            border: none;
            border-radius: 10px;
            background: #111827;
            color: white;
            font-size: 17px;
            font-weight: bold;
            cursor: pointer;
        }

        .login-btn:hover {
            background: #2563eb;
        }

        .back {
            display: block;
            text-align: center;
            margin-top: 18px;
            padding: 12px;
            background: #f3f4f6;
            color: #111827;
            text-decoration: none;
            border-radius: 10px;
            font-weight: bold;
        }

        .security {
            text-align: center;
            margin-top: 20px;
            font-size: 13px;
            color: #6b7280;
        }

        @media (max-width: 600px) {

            body {
                padding: 15px;
            }

            .login-card {
                padding: 25px;
            }

        }

    </style>

</head>

<body>

<div class="login-card">

    <div class="logo">
        💻🔐
    </div>

    <h1>SN Laptop Repair</h1>

    <p class="subtitle">
        Admin Login
    </p>


    <?php if ($error != "") { ?>

        <div class="error">
            <?php echo $error; ?>
        </div>

    <?php } ?>


    <form method="POST">

        <label>Admin Gmail</label>

        <input
            type="email"
            name="username"
            placeholder="Enter admin Gmail"
            required
        >


        <label>Admin Password</label>

        <input
            type="password"
            name="password"
            placeholder="Enter admin password"
            required
        >


        <button
            type="submit"
            name="login"
            class="login-btn"
        >
            🔐 Login to Admin
        </button>

    </form>


    <a href="index.php" class="back">
        ← Back to Website
    </a>


    <div class="security">
        🔒 Authorized Admin Only
    </div>

</div>

</body>

</html>