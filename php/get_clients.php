<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "antique";
$conn = new mysqli($servername, $username, $password, $dbname);
$query = "SELECT client_ID, client_name, client_surname, client_address, client_number FROM clients";

$result = mysqli_query($conn, $query);

$clients = [];

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $clients[] = $row;
    }
}

echo json_encode(['clients' => $clients]);

mysqli_close($conn);
?>
