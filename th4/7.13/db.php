<?php
function pdo() {
    static $pdo = null;
    if ($pdo) return $pdo;
    $host = '127.0.0.1';
    $db   = 'laptopshop';
    $user = 'root';
    $pass = '';
    $dsn  = "mysql:host=$host;dbname=$db;charset=utf8mb4";
    try {
        $pdo = new PDO($dsn, $user, $pass, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
    } catch (PDOException $e) {
        die("Lỗi kết nối database: " . $e->getMessage());
    }
    return $pdo;
}

