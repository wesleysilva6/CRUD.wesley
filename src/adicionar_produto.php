
<?php 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    include '../includes/conexao.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nome = $_POST['nome_produto'];
        $quantidade = $_POST['quantidade'];
        $descricao = $_POST['descricao'];
        $id_topico = $_POST['id_topico'];

        if(!empty($nome) && !empty($quantidade) && !empty($descricao) && !empty($id_topico)) {
            $stmt = $conn->prepare("INSERT INTO produtos (nome_produto, quantidade, descricao, topico_id) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("sisi", $nome, $quantidade, $descricao, $id_topico);
            if($stmt->execute()) {
                $stmt->close();
                header('Location: ../private/home.php?produto=adicionado');
                exit;
            } else {
                $stmt->close();
                header('Location: ../private/home.php?erro=produto');
                exit;
            }
        } else {
            header('Location: ../private/home.php?erro=campos');
            exit;
        }
    }
?>