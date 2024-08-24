<?php
// edit_academic_year.php
include 'db.php'; // Remplacez par le chemin correct de votre fichier de connexion à la base de données

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $academic_year_id = $_POST['academic_year_id'];
    $start_year = $_POST['start_year'];
    $end_year = $_POST['end_year'];

    if (is_numeric($academic_year_id) && is_numeric($start_year) && is_numeric($end_year)) {
        $stmt = $conn->prepare("UPDATE academic_years SET start_year = ?, end_year = ? WHERE id = ?");
        $stmt->bind_param("iii", $start_year, $end_year, $academic_year_id);

        if ($stmt->execute()) {
            echo "Année académique mise à jour avec succès.";
        } else {
            echo "Erreur lors de la mise à jour de l'année académique : " . $conn->error;
        }
        $stmt->close();
    } else {
        echo "Données non valides fournies.";
    }
}

$conn->close();
?>
