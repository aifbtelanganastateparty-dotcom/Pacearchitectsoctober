<?php
$db_file = dirname(__DIR__) . '/contacts.db';

try {
    $pdo = new PDO("sqlite:" . $db_file);
    // Set errormode to exceptions
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Log the actual error internally (error_log($e->getMessage());)
    error_log("Database connection failed: " . $e->getMessage());
    echo "Service temporarily unavailable. Please try again later.";
    exit;
}
?>
