<?php
include 'db_config.php';

$data = json_decode(file_get_contents("php://input"));
$id = $data->id ?? 0;
$name = $data->name ?? '';
$email = $data->email ?? '';

if ($id > 0 && !empty($name) && !empty($email)) {
    $sql = "UPDATE users SET name = ?, email = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$name, $email, $id]);
    echo json_encode(["success" => true, "message" => "User updated"]);
} else {
    echo json_encode(["success" => false, "message" => "Invalid data"]);
}
?>
