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
    // Fetch data and store in an array
    while($row = $result->fetch_assoc()) {
        $products[] = [
            'id' => $row['product_ID'],
            'title' => $row['product_name'],
            'description' => $row['product_category'],
            'price' => $row['product_price'],
            'image' => 'path_to_images/' . $row['product_name'] . '.jpg' // You can modify this to use actual image URLs
        ];
    }
}

// Close connection
$conn->close();

// Set the content type to JSON
header('Content-Type: application/json');

// Output the products as JSON
echo json_encode($products);
?>
