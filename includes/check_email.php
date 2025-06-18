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
        $dados = $result->fetch_assoc();
        $_SESSION['nome'] = $dados['nome'];
        $_SESSION['email_redefinir'] = $dados['email'];
        header('location: ../includes/enviar_email.php');
    }
?>