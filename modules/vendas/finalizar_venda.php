<?php 
    include '../../includes/core/conexao.php';
    session_start();

    $criada_em = date('Y-m-d H:i:s');
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario_id = $_SESSION['id'];
    $nome_cliente = $_POST['nome_cliente'];

    $stmt = $conn->prepare("INSERT INTO simulacoes (usuario_id, nome_cliente, criada_em) VALUE (?, ?, ?)");
    $stmt->bind_param('iss', $usuario_id, $nome_cliente, $criada_em);
    $stmt->execute();
}
?>