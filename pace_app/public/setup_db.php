<?php
require_once 'database.php';

try {
    $sql = "CREATE TABLE IF NOT EXISTS messages (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        name TEXT NOT NULL,
        email TEXT NOT NULL,
        phone TEXT,
        message TEXT NOT NULL,
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP
    )";
    $pdo->exec($sql);
    echo "Database setup successfully.\n";
} catch (PDOException $e) {
    echo "Error creating table: " . $e->getMessage();
}
?>
