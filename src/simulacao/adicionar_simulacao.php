<?php 
    include '../../includes/conexao.php';

    if ($_SERVER ['REQUEST_METHOD'] == 'POST') {
        $nome = $_POST['id'];
        $quantidade = $_POST['quantidade'];

        $stmt = $conn->prepare('SELECT nome_prodouto, preco, quantidade FROM produtos WHERE id = ');
        $result = $stmt->execute();
    }



    header('location: ../../private/simular_venda.php?produto=adicionado')

?>