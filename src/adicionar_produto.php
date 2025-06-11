<?php 
    include '../includes/conexao.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nome = $_POST['nome_produto'];
        $preco = $_POST['preco'];
        $quantidade = $_POST['quantidade'];
        $descricao = $_POST['descricao'];
        $id_topico = $_POST['id_topico'];

        if(!empty($nome) && !empty($preco) && !empty($quantidade) && !empty($descricao) && !empty($id_topico)) {
            $stmt = $conn->prepare("INSERT INTO produtos (nome_produto, preco, quantidade, descricao, topico_id) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sdisi", $nome, $preco, $quantidade, $descricao, $id_topico);
            if($stmt->execute()) {
                $stmt->close();
                header('Location: ../private/home.php?produto=adicionado');
                exit;
            }
        }
    }
?>