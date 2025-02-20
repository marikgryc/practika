<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "antique";
$conn = new mysqli($servername, $username, $password, $dbname);

$query = "SELECT o.order_ID, p.product_name, c.client_name, c.client_surname, o.order_day 
          FROM orders o
          JOIN products p ON o.product_ID = p.product_ID
          JOIN clients c ON o.client_ID = c.client_ID";
$result = mysqli_query($conn, $query);

$orders = [];

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $orders[] = $row;
    }
}

echo json_encode(['orders' => $orders]);

mysqli_close($conn);
?>
