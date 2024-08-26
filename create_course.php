<?php
include 'db.php';

$coursecode = $_POST['course_code'];
$coursename = $_POST['course_name'];
$credits = $_POST['credits'];

$query = "INSERT INTO cours (coursecode, coursename, credits) VALUES ('$coursecode', '$coursename', '$credits')";

if ($conn->query($query) === TRUE) {
    echo "Nouveau cours ajouté avec succès";
} else {
    echo "Erreur: " . $query . "<br>" . $conn->error;
}

$conn->close();
?>
