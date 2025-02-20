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

$data = json_decode(file_get_contents("php://input"), true);

if (empty($data['email']) || empty($data['password'])) {
    die(json_encode(["success" => false, "message" => "Заповніть всі поля"]));
}

// Отримуємо користувача з БД (ВИПРАВЛЕНО `Password`)
$stmt = $conn->prepare("SELECT id, Username, Password, role FROM login WHERE Email = ?");
$stmt->bind_param("s", $data['email']);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();

    if ($data['password'] === $user['Password']) {
        echo json_encode([
            "success" => true,
            "message" => "Вхід успішний!",
            "user_id" => $user['id'],
            "username" => $user['Username'],
            "email" => $data['email'],
            "role" => $user['role']
        ]);
    } else {
        echo json_encode(["success" => false, "message" => "Невірний пароль"]);
    }
} else {
    echo json_encode(["success" => false, "message" => "Користувача не знайдено"]);
}

$stmt->close();
$conn->close();
?>
