<?php 
    require_once '../../includes/core/conexao.php';
    session_start();

        $usuario_id = $_SESSION['id'];

        if (!isset($_SESSION['id'])) {
        header('Location: ../public/login.php?erro=acesso_negado');
        exit;
        }

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $senha_atual = $_POST['senha'];
        $senha_nova = $_POST['nova_senha'];
        $confirmar_senha = $_POST['confirmar_senha'];

        $stmt = $conn->prepare("SELECT senha FROM usuarios WHERE id = ?");
        $stmt->bind_param('i', $usuario_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $usuario = $result->fetch_assoc();

        if (!$usuario || !password_verify($senha_atual, $usuario['senha'])) {
            header('Location: ../../private/perfil.php?senha=incorreta');
            exit;
        }

        if (empty($senha_nova) || empty($confirmar_senha)) {
            header('Location: ../../private/perfil.php?campos=vazios');
            exit;
        }

        if ($senha_nova !== $confirmar_senha) {
            header('Location: ../../private/perfil.php?erro=senhas_diferentes');
            exit;
        }

        $senha_hash = password_hash($senha_nova, PASSWORD_DEFAULT);
        $stmt1 = $conn->prepare("UPDATE usuarios SET senha = ? WHERE id = ?");
        $stmt1->bind_param('si', $senha_hash, $usuario_id);
        $stmt1->execute();
        header('location: ../../private/perfil.php?alterada=sucesso');
        exit;
        }
?>