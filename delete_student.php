<?php
include 'db.php';

$matricule = $_POST['matricule'];
$query = "DELETE FROM students WHERE matricule=$matricule";

if ($conn->query($query) === TRUE) {
    echo "Étudiant supprimé avec succès";
} else {
    echo "Erreur: " . $query . "<br>" . $conn->error;
}

$conn->close();
?>
