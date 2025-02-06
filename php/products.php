<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "antique";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch the products from the database
$sql = "SELECT * FROM products";
$result = $conn->query($sql);

$products = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $products[] = [
            'id' => $row['product_ID'],
            'title' => $row['product_name'],
            'description' => $row['product_category'],
            'price' => $row['product_price'],
            'image' => '/assets/catalogue/' . urlencode($row['image_filename']) 
        ];
    }
}

$conn->close();

header('Content-Type: application/json');

echo json_encode($products);
?>
