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
        $_SESSION['email'] = $usuario['email'];
        header('Location: ../public/home.php');
        exit();
    } else {
        echo "Senha incorreta.";
    }
} else {
    echo "Usuário não encontrado.";
}
?>
