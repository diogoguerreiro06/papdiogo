<?php
session_start();
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email=?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['username'];

       
        header("Location: index.html");
        exit;
    } else {
        echo "Utilizador ou password incorretos.";
    }
}
?>
