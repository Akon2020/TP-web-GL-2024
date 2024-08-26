<?php
include 'db.php';

$query = "SELECT * FROM cours";
$result = $conn->query($query);

while ($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>{$row['coursecode']}</td>
            <td>{$row['coursename']}</td>
            <td>{$row['credits']}</td>
            <td>
                <button class='btn btn-warning edit-btn' data-id='{$row['cousecode']}'>Modifier</button>
                <button class='btn btn-danger delete-btn' data-id='{$row['cousecode']}' data-name='{$row['coursename']}'>Supprimer</button>
            </td>
        </tr>";
}

$conn->close();
?>
