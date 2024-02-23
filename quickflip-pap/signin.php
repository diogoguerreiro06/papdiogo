<?php
session_start();
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username=? OR email=?");
    $stmt->execute([$username, $email]);
    $user = $stmt->fetch();

    if ($user) {
        echo "Utilizador ou e-mail já existe.";
    } else {
        $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        if ($stmt->execute([$username, $email, $password])) {
           
            echo "Utilizador registrado com sucesso.";
           
            header("Location: login.html");
            exit;
        } else {
            echo "Erro ao registar utilizador.";
        }
    }
}
?>
