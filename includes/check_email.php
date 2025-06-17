<?php 
    include 'conexao.php';
    session_start();

    $email_invalido = false;
    $email = $_POST['email'] ?? '';

    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        header('location: ../../public/check.php?erro=email');
        $email_invalido = true;
    } else {
        $email = $result->fetch_assoc();
        $_SESSION['email_redefinir'] = '';
        header('location: ../../public/redefinir.php');
    }
?>