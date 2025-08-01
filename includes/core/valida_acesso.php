<?php
    include 'conexao.php';
    session_start();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';

        $stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

    if ($result->num_rows == 1) {
    $usuario = $result->fetch_assoc();
        if (password_verify($senha, $usuario['senha'])) {
        $_SESSION['id'] = $usuario['id'];
        $_SESSION['email'] = $usuario['email'];
        $_SESSION['nome'] = $usuario['nome'];
        $_SESSION['foto'] = $usuario['foto'];
        header('Location: ../../private/home.php');
        exit;
    } else {
        header('location: ../../public/login.php?erro=senha');
        exit;
        }
    } else {
        header('location: ../../public/login.php?error=email_senha');
        exit;
        }
    }
?>
