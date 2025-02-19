<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "antique";

if ($_SERVER["REQUEST_METHOD"] === "OPTIONS") {
    http_response_code(200);
    exit();
}

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM products";
$result = $conn->query($sql);

$products = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $products[] = [
            'id' => $row['product_ID'],
            'title' => $row['product_name'],
            'author' => $row['product_author'],
            'from' => $row['from_era'],
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
