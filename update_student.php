<?php
include 'db.php';

$matricule = $_POST['matricule'];
$name = $_POST['name'];
$second_name = $_POST['second_name'];
$birth_date = $_POST['birth_date'];
$mutual_number = $_POST['mutual_number'];
$promotion = $_POST['promotion'];
$faculty = $_POST['faculty'];

$query = "UPDATE students SET name='$name', second_name='$second_name', birth_date='$birth_date', mutual_number='$mutual_number', promotion='$promotion', faculty='$faculty' WHERE matricule=$matricule";

if ($conn->query($query) === TRUE) {
    echo "Étudiant mis à jour avec succès";
} else {
    echo "Erreur: " . $query . "<br>" . $conn->error;
}

$conn->close();
?>
