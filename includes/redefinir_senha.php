
    <?php 
    include 'conexao.php';
    session_start();

    // Pegue o email do usuário (pode vir via POST ou SESSION)
    $email = $_SESSION['email_redefinir'];  // Exemplo vindo por formulário

    $senha = $_POST['senha'];
    $confirmar_senha = $_POST['confirmar_senha'];

    if (empty($senha) || empty($confirmar_senha)) {
        header('Location: ../public/redefinir.php?erro=preencher&campos');
        exit;
    }

    // Verifica se as senhas coincidem
    if ($senha !== $confirmar_senha) {
        header('Location: ../public/redefinir.php?erro=senhas_diferentes');
        exit;
    }

    // Faz hash da nova senha
    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

    // Faz o update no banco
    $stmt = $conn->prepare("UPDATE usuarios SET senha = ? WHERE email = ?");
    $stmt ->bind_param('ss', $senha_hash, $email);
    $stmt->execute();

    // Envia e-mail de confirmação
    $assunto = "Redefinição de senha - Estoque Aqui";
    $mensagem = "Olá, sua senha foi redefinida com sucesso!";
    $headers = "From: no-reply@estoqueaqui.com\r\n";

    // Manda o e-mail
    mail($email, $assunto, $mensagem, $headers);

    // Redireciona com sucesso
    header('Location: ../public/login.php?sucesso=senha_alterada');
    exit;
    ?>


