<?php 
    include '../includes/conexao.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nome = $_POST['nome_produto'];
        $quantidade = $_POST['quantidade_produto'];
        $descricao = $_POST['descricao_produto'];

        if(!empty($nome) && !empty($quantidade) && !empty($descricao)) {
            $stmt = $conn->prepare("INSERT INTO produtos (nome_produto, quantidade, descricao) VALUES (?, ?, ?)");
            $stmt->bind_param("sis", $nome, $quantidade, $descricao);
            if($stmt->execute()) {
                header('location: ../private/home.php?produto=adicionado');
            } else {
                header('location: ../private/home.php?erro=produto');
            }
            $stmt->close();
    }
}