<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");
header('Content-Type: application/json');

error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "antique";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die(json_encode(["success" => false, "message" => "Помилка підключення до БД: " . $conn->connect_error]));
}

$data = json_decode(file_get_contents("php://input"), true);

if (empty($data['product_name']) || empty($data['product_category']) || empty($data['product_author']) || empty($data['product_price']) || empty($data['product_quanity'])) {
    die(json_encode(["success" => false, "message" => "Заповніть всі обов'язкові поля."]));
}

$stmt = $conn->prepare("INSERT INTO products (product_category, product_name, product_author, product_material, product_price, product_quanity, from_era, product_state, image_filename) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
if (!$stmt) {
    die(json_encode(["success" => false, "message" => "Помилка запиту: " . $conn->error]));
}

$stmt->bind_param("sssssiiss", $data['product_category'], $data['product_name'], $data['product_author'], $data['product_material'], $data['product_price'], $data['product_quanity'], $data['from_era'], $data['product_state'], $data['image_filename']);

if ($stmt->execute()) {
    echo json_encode(["success" => true, "message" => "Продукт додано успішно."]);
} else {
    echo json_encode(["success" => false, "message" => "Помилка при додаванні продукту."]);
}

$stmt->close();
$conn->close();
?>
