<?php
echo "Το αρχείο φορτώθηκε επιτυχώς!<br>"; // ✅ Έλεγχος αν το αρχείο εκτελείται

$host = "localhost";
$dbname = "easypark";
$username = "root";
$password = ""; // κενό για XAMPP

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Σφάλμα σύνδεσης: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];
    $locationname = $_POST['locationname'];

    $sql = "INSERT INTO freeparkinglots (latitude, longitude, locationname) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("dds", $latitude, $longitude, $locationname);

    if ($stmt->execute()) {
        echo json_encode(["success" => true, "message" => "Προστέθηκε με επιτυχία"]);
    } else {
        echo json_encode(["success" => false, "message" => "Σφάλμα κατά την εισαγωγή"]);
    }

    $stmt->close();
} else {
    echo "Δεν έγινε POST αίτημα.";
}

$conn->close();
?>
