<?php
include 'db.php';

$matricule = $_GET['matricule'];
$query = "SELECT * FROM students WHERE matricule = $matricule";
$result = $conn->query($query);

echo json_encode($result->fetch_assoc());

$conn->close();
?>
