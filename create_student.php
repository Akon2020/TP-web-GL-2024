<?php
include 'db.php';

$name = $_POST['name'];
$second_name = $_POST['second_name'];
$birth_date = $_POST['birth_date'];
$mutual_number = $_POST['mutual_number'];
$promotion = $_POST['promotion'];
$faculty = $_POST['faculty'];

$query = "INSERT INTO students (name, second_name, birth_date, mutual_number, promotion, faculty) VALUES ('$name', '$second_name', '$birth_date', '$mutual_number', '$promotion', '$faculty')";

if ($conn->query($query) === TRUE) {
    echo "Nouvel étudiant ajouté avec succès";
} else {
    echo "Erreur: " . $query . "<br>" . $conn->error;
}

$conn->close();
?>
