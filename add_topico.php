<?php 
    include './includes/conexao.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nome = $_POST['nome_topico'];

        if(!empty($nome)) {
        $stmt = $conn->prepare("INSERT INTO topicos (nome_topico) VALUES (?)");
        $stmt->bind_param("s", $nome);
        }

    if ($stmt->execute()) {
        header('location: ../private/home.php?topico=adicionado');
        exit;
    } 
} 

?>