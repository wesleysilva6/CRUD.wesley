<?php
        include '../../includes/core/conexao.php';
        session_start();

        $usuario_id = $_SESSION['id'];

        if (!isset($_SESSION['id'])) {
            header('Location: ../../public/login.php?erro=acesso_negado');
            exit;
        }

        $stmt = $conn->prepare("SELECT foto FROM usuarios WHERE id = ?");
        $stmt->bind_param('i', $usuario_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $usuario = $result->fetch_assoc();

        if ($usuario && $usuario['foto'] != 'user.png') {
        $caminho_foto = '../../uploads/' . $usuario['foto'];
        if (file_exists($caminho_foto)) {
            unlink($caminho_foto);
        }

        $stmt = $conn->prepare("UPDATE usuarios SET foto = 'user.png' WHERE id = ?");
        $stmt->bind_param('i', $usuario_id);
        $stmt->execute();

        $_SESSION['foto'] = 'user.png';
        }

        header('Location: ../../private/perfil.php?foto=removida');
        exit;
?>
