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

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die(json_encode(["success" => false, "message" => "Помилка підключення до БД: " . $conn->connect_error]));
}

// Отримуємо JSON-дані
$data = json_decode(file_get_contents("php://input"), true);

if (empty($data['name']) || empty($data['email']) || empty($data['password'])) {
    die(json_encode(["success" => false, "message" => "Заповніть всі поля!"]));
}

// Перевіряємо, чи існує користувач
$check_stmt = $conn->prepare("SELECT id FROM login WHERE Email = ?");
$check_stmt->bind_param("s", $data['email']);
$check_stmt->execute();
$check_stmt->store_result();

if ($check_stmt->num_rows > 0) {
    die(json_encode(["success" => false, "message" => "Користувач з таким email вже існує!"]));
}
$check_stmt->close();

// Вставка нового користувача
$role = "user"; // За замовчуванням новий користувач - "user"
$stmt = $conn->prepare("INSERT INTO login (Username, Email, Password, role) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $data['name'], $data['email'], $data['password'], $role);

if ($stmt->execute()) {
    echo json_encode([
        "success" => true,
        "message" => "Реєстрація успішна!",
        "user_id" => $stmt->insert_id,
        "username" => $data['name'],
        "email" => $data['email'],
        "role" => $role
    ]);
} else {
    echo json_encode(["success" => false, "message" => "Помилка реєстрації!"]);
}

$stmt->close();
$conn->close();
?>
