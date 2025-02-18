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

if (empty($data['email']) || empty($data['password'])) {
    die(json_encode(["success" => false, "message" => "Заповніть всі поля"]));
}

$stmt = $conn->prepare("SELECT id, Password FROM login WHERE Email = ?");
if (!$stmt) {
    die(json_encode(["success" => false, "message" => "Помилка запиту: " . $conn->error]));
}

$stmt->bind_param("s", $data['email']);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();

    if ($data['password'] === $user['Password']) {
        die(json_encode([
            "success" => true,
            "message" => "Вхід успішний!",
            "user_id" => $user['id']
        ]));
    } else {
        die(json_encode(["success" => false, "message" => "Невірний пароль"]));
    }
} else {
    die(json_encode(["success" => false, "message" => "Користувача не знайдено"]));
}

$stmt->close();
$conn->close();
?>
