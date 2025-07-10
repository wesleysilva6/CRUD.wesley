<?php 
        include '../../includes/core/conexao.php';
        session_start();
        $usuario_id = $_SESSION['id'];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nome = $_POST['nome_topico'];

        if (!empty($nome)) {
            $stmt = $conn->prepare("INSERT INTO topicos (nome_topico, usuario_id) VALUES (?, ?)");
            $stmt->bind_param("si", $nome, $usuario_id);
                if ($stmt->execute()) {
                header('location: ../../private/home.php?topico=adicionado');
                exit;
            } 
        }   
        header('location: ../../private/home.php?erro=adicionar_topico');
        exit;
    }
?>