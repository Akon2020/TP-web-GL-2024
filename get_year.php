<?php
include 'db.php';

$yearid = $_GET['id'];
$query = "SELECT * FROM academics_years WHERE yearid = $yearid";
$result = $conn->query($query);

echo json_encode($result->fetch_assoc());

$conn->close();
?>
