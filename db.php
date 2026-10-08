<?php
$hostname = 'sql106.infinityfree.com';
$username = 'if0_43100156';
$password = 'paisapaisa03';
$db_name = 'inf0_43100156_snproducts';

if ($_SERVER['HTTP_HOST'] === 'localhost') {
    // Local XAMPP
    $conn = mysqli_connect("localhost", "root", "", "sn_laptop_repair");
}else{
    $conn = mysqli_connect($hostname, $username, $password, $db_name);

}
if (!$conn) {
    die("Connection failed");
}

?>


