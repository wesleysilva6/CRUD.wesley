<?php
        include '../../includes/core/conexao.php';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'] ?? null;
        $nome = $_POST['nome_produto'];
        $preco = $_POST['preco'];
        $quantidade = $_POST['quantidade'];
        $descricao = $_POST['descricao'];
        $id_topico = $_POST['id_topico'];
        $imagem = $_FILES['imagem'] ?? null;
        $caminhoImagem = null;

        if ($id) {
            $busca = $conn->prepare("SELECT imagem FROM produtos WHERE id = ?");
            $busca->bind_param("i", $id);
            $busca->execute();
            $resultado = $busca->get_result();
                if ($row = $resultado->fetch_assoc()) {
                $caminhoImagem = $row['imagem'];
                }
            }
        if ($imagem && $imagem['error'] === 0) {
        $nomeImagem = uniqid('produto_') . '.' . pathinfo($imagem['name'], PATHINFO_EXTENSION);
        $caminhoImagem = '../../uploads/' . $nomeImagem;
        move_uploaded_file($_FILES['imagem']['tmp_name'], '../../uploads/' . $nomeImagem);
    }
        if ($id && $nome && $preco && $quantidade && $descricao && $id_topico) {
        $stmt = $conn->prepare("UPDATE produtos SET nome_produto = ?, preco = ?, quantidade = ?, descricao = ?, topico_id = ?, imagem = ? WHERE id = ?");
        $stmt->bind_param("sdisisi", $nome, $preco, $quantidade, $descricao, $id_topico, $caminhoImagem, $id);
            if ($stmt->execute()) {
                $stmt->close();
                header("Location: ../../private/home.php?produto=editado");
                exit;
            }
        }
    }
?>