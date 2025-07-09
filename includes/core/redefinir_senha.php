
<?php 
    include 'conexao.php';
    session_start();
    $email = $_SESSION['email_redefinir'];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $senha = $_POST['senha'];
        $confirmar_senha = $_POST['confirmar_senha'];
            if (empty($senha) || empty($confirmar_senha)) {
                header('Location: ../../public/redefinir.php?erro=preencher&campos');
                exit;
            }
                if ($senha !== $confirmar_senha) {
                    header('Location: ../../public/redefinir.php?erro=senhas_diferentes');
                    exit;
                }
        $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("UPDATE usuarios SET senha = ? WHERE email = ?");
        $stmt ->bind_param('ss', $senha_hash, $email);
        $stmt->execute();

        require '../../includes/core/senha_redefinida.php';
        enviarConfirmacaoSenhaRedefinida($email, $_SESSION['nome']);

        header('Location: ../../public/login.php?sucesso=senha_alterada');
        exit;
        }
?>


