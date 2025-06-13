<?php
include '../includes/conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? null;
    $nome = $_POST['nome_produto'];
    $preco = $_POST['preco'];
    $quantidade = $_POST['quantidade'];
    $descricao = $_POST['descricao'];
    $id_topico = $_POST['id_topico'];
    $imagem = $_FILES['imagem'] ?? null;

    // Primeiro, busca o caminho da imagem atual (caso o usuário não envie uma nova)
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

    // Se enviou uma nova imagem, atualiza o caminho
    if ($imagem && $imagem['error'] === 0) {
        $nomeImagem = uniqid('produto_') . '.' . pathinfo($imagem['name'], PATHINFO_EXTENSION);
        $caminhoImagem = '../uploads/' . $nomeImagem;
        move_uploaded_file($imagem['tmp_name'], $caminhoImagem);
    }

    if ($id && $nome && $preco && $quantidade && $descricao && $id_topico) {
        $stmt = $conn->prepare("UPDATE produtos SET nome_produto = ?, preco = ?, quantidade = ?, descricao = ?, topico_id = ?, imagem = ? WHERE id = ?");
        $stmt->bind_param("sdisisi", $nome, $preco, $quantidade, $descricao, $id_topico, $caminhoImagem, $id);

        if ($stmt->execute()) {
            $stmt->close();
            header("Location: ../private/home.php?produto=editado");
            exit;
        }
    }
}
?>