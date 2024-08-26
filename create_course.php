<?php
include 'db.php';

$coursecode = $_POST['courseCode'];
$coursename = $_POST['courseName'];
$credits = $_POST['courseCredits'];

$query = "INSERT INTO cours (coursecode, coursename, credits) VALUES ('$coursecode', '$coursename', '$credits')";

if ($conn->query($query) === TRUE) {
    echo "Nouveau cours ajouté avec succès";
} else {
    echo "Erreur: " . $query . "<br>" . $conn->error;
}

$conn->close();
?>
