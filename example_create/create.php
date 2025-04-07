<?php
include 'db_config.php';

$data = json_decode(file_get_contents("php://input"));
$name = $data->name ?? '';
$email = $data->email ?? '';

if (!empty($name) && !empty($email)) {
    $sql = "INSERT INTO users (name, email, created_at) VALUES (?, ?, NOW())";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$name, $email]);
    echo json_encode(["success" => true, "message" => "User created successfully"]);
} else {
    echo json_encode(["success" => false, "message" => "Invalid input"]);
}
?>