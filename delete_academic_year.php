<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $academic_year_id = $_POST['academic_year_id'];

    if (is_numeric($academic_year_id)) {
        $stmt = $conn->prepare("DELETE FROM academics_years WHERE id = ?");
        $stmt->bind_param("i", $academic_year_id);

        if ($stmt->execute()) {
            echo "Année académique supprimée avec succès.";
        } else {
            echo "Erreur lors de la suppression de l'année académique : " . $conn->error;
        }
        $stmt->close();
    } else {
        echo "Identifiant d'année académique non valide.";
    }
}

$conn->close();
?>