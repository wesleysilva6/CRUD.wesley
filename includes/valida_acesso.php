<?php
include '../includes/conexao.php';
session_start();


$email = $_POST['email'] ?? '';
$senha = $_POST['senha'] ?? '';


// Evita SQL Injection usando prepared statement
$stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 1) {
    $usuario = $result->fetch_assoc();

    // Verifica a senha
    if (password_verify($senha, $usuario['senha'])) {
        $_SESSION['id'] = $usuario['id'];
        $_SESSION['email'] = $usuario['email'];
        $_SESSION['nome'] = $usuario['nome'];
        header('Location: ../private/home.php');
        exit();
    } else {
        header('location: ../public/login.php?erro');
    }
    } else {
    header('location: ../public/login.php?erro=login');
}
?>
