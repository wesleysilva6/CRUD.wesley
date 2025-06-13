<?php 
    include '../../includes/conexao.php';
    session_start();
    $id = $_SESSION['id'];
    $deletar = $_GET['id'];

        if(!empty($deletar) && is_numeric($deletar) && !empty($id) && is_numeric($id)) {
        $stmt = $conn->prepare("DELETE FROM produtos WHERE id = ? AND topico_id IN (SELECT id_topico FROM topicos WHERE usuario_id = ?)");
        $stmt->bind_param('ii', $deletar, $id);
        $stmt->execute();
        header ('location: ../../private/home.php?produto=removido');
    }
?>