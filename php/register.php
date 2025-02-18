<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "antique";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die(json_encode(["success" => false, "message" => "Помилка підключення до БД"]));
}

$data = json_decode(file_get_contents("php://input"), true);

if (empty($data['name']) || empty($data['email']) || empty($data['password'])) {
    echo json_encode(["success" => false, "message" => "Заповніть всі поля"]);
    exit;
}

$checkStmt = $conn->prepare("SELECT * FROM login WHERE Username = ? OR Email = ?");
$checkStmt->bind_param("ss", $data['name'], $data['email']);
$checkStmt->execute();
$result = $checkStmt->get_result();
if ($result->num_rows > 0) {
    echo json_encode(["success" => false, "message" => "Користувач з таким ім'ям або email вже існує"]);
    exit;
}
$checkStmt->close();

$stmt = $conn->prepare("INSERT INTO login (Username, Email, Password) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $data['name'], $data['email'], $data['password']);
    
if ($stmt->execute()) {
    echo json_encode(["success" => true, "message" => "Реєстрація успішна!"]);
} else {
    echo json_encode(["success" => false, "message" => "Помилка при реєстрації"]);
}

$stmt->close();
$conn->close();
?>
