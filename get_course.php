<?php
include 'db.php';

$coursecode = $_GET['coursecode'];
$query = "SELECT * FROM cours WHERE coursecode = $coursecode";
$result = $conn->query($query);

echo json_encode($result->fetch_assoc());

$conn->close();
?>
