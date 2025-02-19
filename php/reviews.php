<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With');
header('Content-Type: application/json');

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "antique";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die(json_encode(["success" => false, "message" => "Помилка підключення: " . $conn->connect_error]));
}

if ($_SERVER["REQUEST_METHOD"] == "OPTIONS") {
    http_response_code(200);
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $sql = "SELECT review.review_Id, review.client_name, review.review_date, review.review_desc, 
                   products.product_ID, products.product_name 
            FROM review 
            JOIN products ON review.product_ID = products.product_ID 
            ORDER BY review.review_date DESC";

    $result = $conn->query($sql);
    $reviews = [];

    while ($row = $result->fetch_assoc()) {
        $reviews[] = [
            'review_Id' => $row['review_Id'],
            'client_name' => $row['client_name'],
            'review_date' => $row['review_date'],
            'review_desc' => $row['review_desc'],
            'product_ID' => $row['product_ID'], 
            'product_name' => $row['product_name']
        ];
    }

    echo json_encode($reviews);
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = json_decode(file_get_contents("php://input"), true);
    
    $client_name = trim($data["client_name"] ?? "");
    $product_ID = intval($data["product_ID"] ?? 0);
    $review_desc = trim($data["review_desc"] ?? "");
    $review_date = date("Y-m-d H:i:s");

    if (!empty($client_name) && !empty($product_ID) && !empty($review_desc)) {
        $stmt = $conn->prepare("INSERT INTO review (client_name, product_ID, review_date, review_desc) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("siss", $client_name, $product_ID, $review_date, $review_desc);

        if ($stmt->execute()) {
            echo json_encode(["success" => true, "message" => "Відгук успішно додано"]);
        } else {
            echo json_encode(["success" => false, "message" => "Помилка при додаванні відгуку"]);
        }

        $stmt->close();
    } else {
        echo json_encode(["success" => false, "message" => "Всі поля повинні бути заповнені"]);
    }
}

$conn->close();
?>
