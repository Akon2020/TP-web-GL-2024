<?php
include 'db.php';

$query = "SELECT * FROM academics_years";
$result = $conn->query($query);

while ($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['start_year']}</td>
            <td>{$row['end_year']}</td>
                <button class='btn btn-warning edit-btn' data-id='{$row['id']}'>Modifier</button>
                <button class='btn btn-danger delete-btn' data-id='{$row['id']}' data-name='{$row['start_year']}'>Supprimer</button>
            </td>
        </tr>";
}

$conn->close();
?>
