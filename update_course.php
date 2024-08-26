<?php
include 'db.php';

$coursecode = $_POST['course_code'];
$coursename = $_POST['course_name'];
$credits = $_POST['credits'];

$query = "UPDATE cours SET coursename='$coursename', credits='$credits' WHERE coursecode='$coursecode'";

if ($conn->query($query) === TRUE) {
    echo "Cours mis à jour avec succès";
} else {
    echo "Erreur lors de la mise à jour: " . $conn->error;
}

$conn->close();
?>
