<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "real_estate_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$type = 'buy'; // Change this to 'rent' for the Rent page

$sql = "SELECT * FROM properties WHERE type = '$type'";
$result = $conn->query($sql);

$properties = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $properties[] = $row;
    }
}
$conn->close();

header('Content-Type: application/json');
echo json_encode($properties);
?>
