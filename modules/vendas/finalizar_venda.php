<?php 
include '../../includes/core/conexao.php';
session_start();

$criada_em = date('Y-m-d H:i:s');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario_id = $_SESSION['id'];
    $nome_cliente = $_SESSION['cliente'] ?? 'Cliente não informado';

    $total = 0;
    if (isset($_SESSION['simulacao']) && !empty($_SESSION['simulacao'])) {
        foreach ($_SESSION['simulacao'] as $produto_id => $item) {
            $quantidade = $item['quantidade'];
            $preco = $item['preco'];
            $subtotal = $quantidade * $preco;
            $total += $subtotal;
        }
    }

    // Agora insere na tabela simulacoes com o total correto
    $stmt = $conn->prepare("INSERT INTO simulacoes (usuario_id, cliente, criada_em, total) VALUES (?, ?, ?, ?)");
    $stmt->bind_param('issd', $usuario_id, $nome_cliente, $criada_em, $total);
    $stmt->execute();
    $simulacao_id = $conn->insert_id;

    if (isset($_SESSION['simulacao']) && !empty($_SESSION['simulacao'])) {
        $stmt1 = $conn->prepare("INSERT INTO itens_simulacao (id_simulacao, produto_id, nome_produto, quantidade, preco, subtotal) VALUES (?, ?, ?, ?, ?, ?)");
        foreach ($_SESSION['simulacao'] as $produto_id => $item) {
            $quantidade = $item['quantidade'];
            $preco = $item['preco'];
            $nome_produto = $item['nome_produto'] ?? ''; // garanta que está passando o nome
            $subtotal = $quantidade * $preco;
            $stmt1->bind_param('iisidd', $simulacao_id, $produto_id, $nome_produto, $quantidade, $preco, $subtotal);
            $stmt1->execute();
        }
    }

    unset($_SESSION['simulacao']);
    unset($_SESSION['cliente']);
}

header('Location: ../../private/simular_venda.php?status=sucesso');
exit;
?>
