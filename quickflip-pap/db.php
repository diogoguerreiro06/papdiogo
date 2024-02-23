<?php
$host = 'localhost'; 
$dbname = 'quickflip';
$user = 'root';
$pass = '12345678';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erro de conexão: " . $e->getMessage();
}
?>
