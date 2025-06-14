<?php 
include '../../includes/conexao.php';
ini_set('display_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome_produto'];
    $preco = $_POST['preco'];
    $quantidade = $_POST['quantidade'];
    $descricao = $_POST['descricao'];
    $id_topico = $_POST['id_topico'];
    $imagem = $_FILES['imagem'];
    $nomeImagem = '';
    $caminhoImagem = null;

    if ($imagem['error'] === 0) {
        $nomeImagem = uniqid('produto_') . "." . pathinfo($imagem['name'], PATHINFO_EXTENSION);
        $caminhoImagem = '../../uploads/' . $nomeImagem;
        move_uploaded_file($imagem['tmp_name'], $caminhoImagem);
    }

    if(!empty($nome) && !empty($preco) && !empty($quantidade) && !empty($descricao) && !empty($id_topico)) {
        if (!$caminhoImagem) {
        $caminhoImagem = ''; // define como vazio se não tiver imagem
        }

        $stmt = $conn->prepare("INSERT INTO produtos (nome_produto, preco, quantidade, descricao, topico_id, imagem) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sdisis", $nome, $preco, $quantidade, $descricao, $id_topico, $caminhoImagem);
        if($stmt->execute()) {
            $stmt->close();
            header('Location: ../../private/home.php?produto=adicionado');
            exit;
        }
    }
}
?>