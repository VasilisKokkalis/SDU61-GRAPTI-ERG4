<?php
include 'db_config.php';

$data = json_decode(file_get_contents("php://input"));
$id = $data->id ?? 0;

if ($id > 0) {
    $sql = "DELETE FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);
    echo json_encode(["success" => true, "message" => "User deleted"]);
} else {
    echo json_encode(["success" => false, "message" => "Invalid ID"]);
}
?>