<?php 
    session_start();
    require_once '../../../includes/core/conexao.php';

    header('Content-Type: application/json');

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nome_funcionario = $_POST['nome_funcionario'];
        $cargo_funcionario = $_POST['cargo_funcionario'];
        $email_funcionario = $_POST['email_funcionario'];
        $tel_funcionario = $_POST['tel_funcionario'];
        $salario_funcionario = $_POST['salario_funcionario'];
        $status_funcionario = $_POST['status_funcionario'];
        $foto_funcionario = $_FILES['foto_funcionario'];
        $nomeImagem = '';
        $caminhoImagem = null;

    if (isset($_FILES['foto_funcionario']) && $_FILES['foto_funcionario']['error'] === 0) {
        $extensao = pathinfo($_FILES['foto_funcionario']['name'], PATHINFO_EXTENSION);
        $nomeImagem = uniqid('funcionario_') . "." . $extensao;
        $caminhoImagem = '../../../uploads/' . $nomeImagem;
        move_uploaded_file($_FILES['foto_funcionario']['tmp_name'], $caminhoImagem);
    }

        $stmt = $conn->prepare("INSERT INTO funcionarios (nome, cargo, email, telefone, salario, status, foto) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssdss", $nome_funcionario, $cargo_funcionario, $email_funcionario, $tel_funcionario, $salario_funcionario, $status_funcionario, $caminhoImagem);
        if ($stmt->execute()) {
        echo json_encode([
            'success' => true,
            'nome' => $nome_funcionario,
            'cargo' => $cargo_funcionario,
            'email' => $email_funcionario,
            'telefone' => $tel_funcionario,
            'status' => $status_funcionario,
            'foto' => $caminhoImagem
        ]);
        exit;
        } else {
            echo json_encode(['success' => false]);
            exit;
        }
    }
?>