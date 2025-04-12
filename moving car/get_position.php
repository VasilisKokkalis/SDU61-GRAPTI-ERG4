<?php
$host = "localhost";
$db = "MOVING CAR";
$user = "root";
$pass = "";

// Σύνδεση στη βάση δεδομένων
$conn = new mysqli($host, $user, $pass, $db);

// Έλεγχος σύνδεσης
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Εκτέλεση query για ανάκτηση θέσης
$sql = "SELECT x, y FROM car_position WHERE id = 1";
$result = $conn->query($sql);

// Αν υπάρχει αποτέλεσμα, επιστρέφεται ως JSON
if ($result && $row = $result->fetch_assoc()) {
  echo json_encode($row);
} else {
  echo json_encode(["x" => 0, "y" => 0]); // default τιμές αν δεν υπάρχει αποθηκευμένη θέση
}

// Κλείσιμο σύνδεσης
$conn->close();
?>
