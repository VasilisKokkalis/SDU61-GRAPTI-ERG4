<?php
$host = "localhost";
$db = "MOVING PARK";
$user = "root";
$pass = "";

// Get POST data
$posX = $_POST['x'];
$posY = $_POST['y'];

// Connect to MySQL
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Insert or update position (1 row)
$sql = "REPLACE INTO car_position (id, x, y) VALUES (1, '$posX', '$posY')";
if ($conn->query($sql) === TRUE) {
  echo "Position saved";
} else {
  echo "Error: " . $conn->error;
}
$conn->close();
?>
