<?php 
        include '../../includes/core/conexao.php';
        session_start();

        $usuario_id = $_SESSION['id'];

        $stmt = $conn->prepare("SELECT id FROM simulacoes WHERE usuario_id = ?");
        $stmt->bind_param('i', $usuario_id);
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
            $id_simulacao = $row['id'];
            $stmtItens = $conn->prepare("DELETE FROM itens_simulacao WHERE id_simulacao = ?");
            $stmtItens->bind_param('i', $id_simulacao);
            $stmtItens->execute();
            $stmtItens->close();
        }
        $stmt->close();

        $stmt = $conn->prepare("DELETE FROM simulacoes WHERE usuario_id = ?");
        $stmt->bind_param('i', $usuario_id);
        $stmt->execute();
        $stmt->close();

        header('Location: ../../private/historico.php?produtos=removidos');
        exit;
?>
