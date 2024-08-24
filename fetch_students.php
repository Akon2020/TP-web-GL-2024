<?php
include 'db.php';

$query = "SELECT * FROM students, academic_year";
$result = $conn->query($query);

while ($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>{$row['matricule']}</td>
            <td>{$row['name']}</td>
            <td>{$row['second_name']}</td>
            <td>{$row['birth_date']}</td>
            <td>{$row['mutual_number']}</td>
            <td>{$row['promotion']}</td>
            <td>{$row['faculty']}</td>
            <td>{$row['start_date']} - {$row['end_date']}</td>
            <td>
                <button class='btn btn-warning edit-btn' data-id='{$row['matricule']}'>Modifier</button>
                <button class='btn btn-danger delete-btn' data-id='{$row['matricule']}' data-name='{$row['name']}'>Supprimer</button>
            </td>
        </tr>";
}

$conn->close();
?>
