<?php
// includes/update_student.php
require_once __DIR__ . '/db.php';

// Handle form submission to update the record
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_record'])) {
    $id = $_POST['id'];
    $surname = $_POST['surname'];
    $name = $_POST['name'];
    $middlename = $_POST['middlename'];
    $address = $_POST['address'];
    $contact = $_POST['contact_number'];

    try {
        $stmt = $pdo->prepare("UPDATE students SET surname = :surname, name = :name, middlename = :middlename, address = :address, contact_number = :contact WHERE id = :id");
        $stmt->execute([
            ':id' => $id,
            ':surname' => $surname,
            ':name' => $name,
            ':middlename' => $middlename,
            ':address' => $address,
            ':contact' => $contact
        ]);
        header("Location: ../public/index.php?status=success");
        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>