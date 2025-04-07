<?php
include 'db_config.php';

$stmt = $conn->query("SELECT * FROM users ORDER BY id DESC");
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo "<h3>Λίστα Χρηστών</h3>";
foreach ($users as $user) {
    echo "👤 " . $user['name'] . " (" . $user['email'] . ")<br>";
}
?>
