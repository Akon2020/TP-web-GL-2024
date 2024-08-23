<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "student_management";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("La connexion à la base de donnée a échouée: " . $conn->connect_error);
}
?>
