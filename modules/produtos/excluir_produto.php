<?php 
        include '../../includes/core/conexao.php';
        session_start();

        $id = $_SESSION['id'];
        $deletar = $_GET['id_produto'];

        if(!empty($deletar) && is_numeric($deletar) && !empty($id) && is_numeric($id)) {
        $busca = $conn->prepare("SELECT imagem FROM produtos WHERE id = ? AND topico_id IN (SELECT id_topico FROM topicos WHERE usuario_id = ?)");
        $busca->bind_param('ii', $deletar, $id);
        $busca->execute();
        $resultado = $busca->get_result();
            if ($row = $resultado->fetch_assoc()) {
                $caminhoImagem = $row['imagem'];
                    if (!empty($caminhoImagem)) {
                    $caminhoFisico = dirname(__DIR__, 2) . '/' . $caminhoImagem;
                        if (file_exists($caminhoFisico)) {
                        unlink($caminhoFisico);
                        }
                    }
                }
        $busca->close();
        $stmt = $conn->prepare("DELETE FROM produtos WHERE id = ? AND topico_id IN (SELECT id_topico FROM topicos WHERE usuario_id = ?)");
        $stmt->bind_param('ii', $deletar, $id); 
        $stmt->execute();
        $stmt->close();
        header ('location: ../../private/home.php?produto=removido');
        exit;
    }
?>