<?php
        include '../../includes/core/conexao.php';
        session_start();

        if (!isset($_SESSION['id'])) {
            header('Location: ../../public/login.php?erro=acesso_negado');
            exit;
        }

        $usuario_id = $_SESSION['id'];

        $stmt = $conn->prepare("SELECT foto FROM usuarios WHERE id = ?");
        $stmt->bind_param('i', $usuario_id);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $usuario = $resultado->fetch_assoc();

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
