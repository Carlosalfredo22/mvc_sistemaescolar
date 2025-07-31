<?php
// Database configuration
define('DB_HOST', 'localhost');
define('DB_NAME', 'mvc_sistemaescolar');
define('DB_USER', 'root');
define('DB_PASS', '');

try {
    $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>
