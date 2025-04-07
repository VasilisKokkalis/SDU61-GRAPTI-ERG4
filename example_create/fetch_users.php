<?php
include 'db_config.php';
$stmt = $conn->query("SELECT * FROM users");
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($data);
?>
