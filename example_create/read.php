<?php
include 'db_config.php';

$sql = "SELECT * FROM users ORDER BY id DESC";
$stmt = $conn->query($sql);
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($users);
?>
