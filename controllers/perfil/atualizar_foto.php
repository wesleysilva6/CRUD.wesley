<?php
        require_once '../../includes/core/conexao.php';
        session_start();

        if (!isset($_SESSION['id'])) {
        header('Location: ../../public/login.php?erro=acesso_negado');
        exit;
        }

        $usuario_id = $_SESSION['id'];

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['foto'])) {
        $foto = $_FILES['foto'];
        $ext = pathinfo($foto['name'], PATHINFO_EXTENSION);
        $nome_arquivo = 'foto_user_' . $usuario_id . '_' . time() . '.' . $ext;
        $caminho_destino = '../../uploads/' . $nome_arquivo;

        if (move_uploaded_file($foto['tmp_name'], $caminho_destino)) {
        $stmt = $conn->prepare("SELECT foto FROM usuarios WHERE id = ?");
        $stmt->bind_param('i', $usuario_id);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $usuario = $resultado->fetch_assoc();

        if ($usuario && $usuario['foto'] != 'user.png') {
        $caminho_antigo = '../../uploads/' . $usuario['foto'];
            if (file_exists($caminho_antigo)) {
                unlink($caminho_antigo);
            }
        }

        $stmt = $conn->prepare("UPDATE usuarios SET foto = ? WHERE id = ?");
        $stmt->bind_param('si', $nome_arquivo, $usuario_id);
            if ($stmt->execute()) {
            $_SESSION['foto'] = $nome_arquivo;
            }
        }
    } 
    header('Location: ../../private/perfil.php?foto=sucesso');
    exit;
?>
