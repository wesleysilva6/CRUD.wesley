<?php 
    include '../../includes/conexao.php';
    $id = $_GET['id_topico'];

        if($id == TRUE) {
        $stmt = $conn->prepare("DELETE FROM produtos WHERE topico_id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $stmt2 = $conn->prepare("DELETE FROM topicos WHERE id_topico = ?");
        $stmt2->bind_param("i", $id);
        $stmt2->execute();
        header('location: ../../private/home.php?topico=removido');
        }
?>