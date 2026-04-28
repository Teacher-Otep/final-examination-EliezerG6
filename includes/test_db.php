<?php
// Include your existing database connection file
require_once __DIR__ . '/db.php';

try {
    // Check if the connection variable $pdo exists and is an instance of PDO
    if ($pdo instanceof PDO) {
        echo "Connection successful! Connected to database: " . $db . " on port: " . $port;
    }
} catch (Exception $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>