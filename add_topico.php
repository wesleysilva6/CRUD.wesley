<?php 
session_start();
include './includes/conexao.php';

    

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome_topico'];
    $usuario_id = $_SESSION['id']; // <-- aqui sim está definido corretamente

    if (!empty($nome)) {
        $stmt = $conn->prepare("INSERT INTO topicos (nome_topico, usuario_id) VALUES (?, ?)");
        $stmt->bind_param("si", $nome, $usuario_id);

        if ($stmt->execute()) {
            header('location: ../private/home.php?topico=adicionado');
            exit;
        } else {
            echo "Erro ao inserir tópico.";
        }
    }
}


?>