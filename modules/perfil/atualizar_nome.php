<?php 
    include '../../includes/core/conexao.php';
    session_start();

        if (!isset($_SESSION['id'])) {
        header('Location: ../public/login.php?erro=acesso_negado');
        exit;
        }

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $novo_nome = $_POST['novo_nome'];
        $usuario_id = $_SESSION['id'];

        if (!empty($novo_nome)) {
        $stmt = $conn->prepare('UPDATE usuarios SET nome = ? WHERE id = ?');
        $stmt->bind_param('si', $novo_nome, $usuario_id);
        if ($stmt->execute()) {
            $_SESSION['nome'] = $novo_nome;
            header('Location: ../../private/perfil.php?status=nome_atualizado');
            exit;
            }
        } else { 
            header('Location: ../../private/perfil.php?nome=vazio');
            exit;
        }
    } 

?>