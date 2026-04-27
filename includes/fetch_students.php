<?php
// Ensure this file is inside your includes/ folder
require_once __DIR__ . '/db.php';

try {
    // Select all records from the table
    $stmt = $pdo->query("SELECT * FROM students");
    $students = $stmt->fetchAll();

    if ($students) {
        // Display data in a table
        echo "<table border='1' class='student-table'>
                <tr>
                    <th>ID</th>
                    <th>Surname</th>
                    <th>Name</th>
                    <th>Middle Name</th>
                    <th>Address</th>
                    <th>Contact Number</th>
                </tr>";

        foreach ($students as $row) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['surname']}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['middlename']}</td>
                    <td>{$row['address']}</td>
                    <td>{$row['contact_number']}</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No records found in the database.</p>";
    }
} catch (PDOException $e) {
    echo "Database Error: " . $e->getMessage();
}
?>