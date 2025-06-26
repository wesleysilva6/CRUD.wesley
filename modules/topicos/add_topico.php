<?php 
    include '../../includes/core/conexao.php';
    session_start();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome_topico'];
    $usuario_id = $_SESSION['id'];

    if (!empty($nome)) {
        $stmt = $conn->prepare("INSERT INTO topicos (nome_topico, usuario_id) VALUES (?, ?)");
        $stmt->bind_param("si", $nome, $usuario_id);

        if ($stmt->execute()) {
            header('location: ../../private/home.php?topico=adicionado');
            exit;
        } else {
            header('location: ../../private/home.php?erro=adicionar_topico');
            exit;
        }
    }
}
?>