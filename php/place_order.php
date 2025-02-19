<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "antique";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die(json_encode(["success" => false, "message" => "Помилка підключення до БД"]));
}

$data = json_decode(file_get_contents("php://input"), true);

if (!$data || empty($data['cart'])) {
    echo json_encode(["success" => false, "message" => "Некоректні дані або кошик порожній"]);
    exit;
}

$stmt = $conn->prepare("INSERT INTO clients (client_name, client_surname, client_address, client_number) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $data['name'], $data['surname'], $data['address'], $data['phone']);
if (!$stmt->execute()) {
    echo json_encode(["success" => false, "message" => "Помилка при додаванні клієнта"]);
    exit;
}
$clientID = $stmt->insert_id;
$stmt->close();


$stmt = $conn->prepare("INSERT INTO orders (product_ID, client_ID, order_day) VALUES (?, ?, NOW())");

foreach ($data['cart'] as $item) {
    if (!isset($item['id']) || !is_numeric($item['id'])) {
        echo json_encode(["success" => false, "message" => "Некоректний товар у кошику"]);
        exit;
    }
    $stmt->bind_param("ii", $item['id'], $clientID);
    if (!$stmt->execute()) {
        echo json_encode(["success" => false, "message" => "Помилка при оформленні замовлення"]);
        exit;
    }
}

$stmt->close();
$conn->close();

echo json_encode(["success" => true, "message" => "Замовлення оформлено!"]);
?>