<?php
include 'db.php';

$query = "SELECT * FROM cours";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr> <td>" . $row['coursecode'] . "</td> <td>" . $row['coursename'] . "</td> <td>" . $row['credits'] . "</td> <td> <button class='btn btn-sm btn-warning edit-btn' data-id='" . $row['coursecode'] . "'>Modifier</button> <button class='btn btn-sm btn-danger delete-btn' data-id='" . $row['coursecode'] . "' data-name='" . $row['coursename'] . "'>Supprimer</button> </td> </tr>";
    }
} else {
    echo "<tr><td colspan='4'>Aucun cours trouvé.</td></tr>";
}

$conn->close();
?>
