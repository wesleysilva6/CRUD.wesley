<?php 
    session_start();
    require_once '../../../includes/core/conexao.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nome_vendedor = $_POST['nome_vendedor'];
        $email_vendedor = $_POST['email_vendedor'];
        $tel_vendedor = $_POST['tel_vendedor'];
        $foto_vendedor = $_FILES['foto_vendedor'];
        $nomeImagem = '';
        $caminhoImagem = null;

    if (isset($_FILES['foto_vendedor']) && $_FILES['foto_vendedor']['error'] === 0) {
        $extensao = pathinfo($_FILES['foto_vendedor']['name'], PATHINFO_EXTENSION);
        $nomeImagem = uniqid('vendedor_') . "." . $extensao;
        $caminhoImagem = '../../../uploads/' . $nomeImagem;

        move_uploaded_file($_FILES['foto_vendedor']['tmp_name'], $caminhoImagem);
    }

        $stmt = $conn->prepare("INSERT INTO vendedores (nome, email, telefone, foto) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $nome_vendedor, $email_vendedor, $tel_vendedor, $caminhoImagem);
        if ($stmt->execute()) {
            $stmt->close();
            header('location: ../../views/config.php?vendedor=cadastrado');
            exit;
        } else {
            header ('location: ../../views/config.php?vendedor=nao_cadastrado');
            exit;
        }
    }
?>