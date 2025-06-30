<?php 
include '../../includes/core/conexao.php';
session_start();

$criada_em = date('Y-m-d H:i:s');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario_id = $_SESSION['id'];
    $nome_cliente = $_SESSION['cliente'] ?? 'Cliente não informado';

    $stmt = $conn->prepare("INSERT INTO simulacoes (usuario_id, cliente, criada_em) VALUES (?, ?, ?)");
    $stmt->bind_param('iss', $usuario_id, $nome_cliente, $criada_em);
    $stmt->execute();
    $simulacao_id = $conn->insert_id;
    if (isset($_SESSION['simulacao']) && !empty($_SESSION['simulacao'])) {
        $stmt1 = $conn->prepare("INSERT INTO itens_simulacao (id_simulacao, produto_id, nome_produto, quantidade, preco, subtotal) VALUES (?, ?, ?, ?, ?, ?)");
        foreach ($_SESSION['simulacao'] as $produto_id => $item) {
            $quantidade = $item['quantidade'];
            $preco = $item['preco'];
            $stmt1->bind_param('iisidd', $simulacao_id, $produto_id, $nome_produto, $quantidade, $preco, $subtotal);
            $stmt1->execute();
            
        }
    }unset($_SESSION['simulacao']);
    unset($_SESSION['cliente']);
}
header('Location: ../../private/simular_venda.php?status=sucesso');
exit;
?>
