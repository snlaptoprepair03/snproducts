<?php

session_start();
include "db.php";

if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header("Location: admin_login.php");
    exit;
}

if (isset($_GET['id'])) {

    $id = (int) $_GET['id'];

    $sql = "DELETE FROM products WHERE id = $id";

    if (mysqli_query($conn, $sql)) {

        header("Location: index.php");
        exit;

    } else {

        echo "Error deleting product: " . mysqli_error($conn);
    }

} else {

    echo "Product ID not found.";
}

?>