<?php
// add_academic_year.php
include 'db.php'; // Remplacez par le chemin correct de votre fichier de connexion à la base de données

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $start_year = $_POST['start_year'];
    $end_year = $_POST['end_year'];

    // Validation basique
    if (is_numeric($start_year) && is_numeric($end_year)) {
        $stmt = $conn->prepare("INSERT INTO academics_years (start_year, end_year) VALUES (?, ?)");
        $stmt->bind_param("ii", $start_year, $end_year);

        if ($stmt->execute()) {
            echo "Année académique ajoutée avec succès.";
        } else {
            echo "Erreur lors de l'ajout de l'année académique : " . $conn->error;
        }
        $stmt->close();
    } else {
        echo "Veuillez entrer des années valides.";
    }
}

$conn->close();
?>
