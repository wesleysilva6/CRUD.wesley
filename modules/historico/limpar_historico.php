<?php 
    include '../../includes/core/conexao.php';
    session_start();

    $usuario_id = $_SESSION['id'];
    $id = $_SESSION['simulacao'];

        if($id == TRUE) {
        $stmt = $conn->prepare("DELETE FROM itens_simulacao WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $stmt2 = $conn->prepare("DELETE FROM simulacoes WHERE id = ? AND usuario_id = ?");
        $stmt2->bind_param("i", $id, $usuario_id);
        $stmt2->execute();
        header('location: ../../private/historico.php?historico=limpo');
        exit;
        }
?>