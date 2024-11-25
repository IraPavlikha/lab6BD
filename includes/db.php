<?php
$host = '127.0.0.1';
$username = 'root';
$password = '';
$dbname = 'Apteka';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Помилка підключення: ' . $e->getMessage();
}
?>
