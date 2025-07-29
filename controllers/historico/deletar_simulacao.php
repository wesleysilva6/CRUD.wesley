<?php 
        include '../../includes/core/conexao.php';
        session_start();

        $usuario_id = $_SESSION['id'];
        $id_item = $_GET['id_item'] ?? null;

        $stmt = $conn->prepare("SELECT id_simulacao FROM itens_simulacao WHERE id = ?");
        $stmt->bind_param('i', $id_item);
        $stmt->execute();
        $result = $stmt->get_result();

        $row = $result->fetch_assoc();
        $id_simulacao = $row['id_simulacao'];
        $stmt->close();

        $stmt = $conn->prepare("DELETE FROM itens_simulacao WHERE id = ?");
        $stmt->bind_param('i', $id_item);
        $stmt->execute();
        $stmt->close();

        if ($id_item >= 0) {
        $stmt = $conn->prepare("DELETE FROM simulacoes WHERE id = ? AND usuario_id = ?");
        $stmt->bind_param('ii', $id_simulacao, $usuario_id);
        $stmt->execute();
        $stmt->close();
        }

        header('Location: ../../private/historico.php?produto=removido');
        exit;
?>
