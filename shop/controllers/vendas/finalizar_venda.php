<?php 
require_once '../../../includes/core/conexao.php';
session_start();
$realizada_em = date('Y-m-d H:i:s');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario_id   = $_SESSION['id'];
    $nome_cliente = $_SESSION['cliente'] ?? 'Cliente não informado';
    $tel_cliente  = $_SESSION['telefone'] ?? '';
    $vendedor     = $_SESSION['vendedor'] ?? null;
    $total        = 0;

    if (isset($_SESSION['venda']) && !empty($_SESSION['venda'])) {
        foreach ($_SESSION['venda'] as $produto_id => $item) {
            $quantidade = $item['quantidade'];
            $preco      = $item['preco'];
            $subtotal   = $quantidade * $preco;
            $total     += $subtotal;
        }
    }

    if (empty($_SESSION['venda']) || $total <= 0) {
        header('location: ../../views/vendas.php?simulacao=vazia');
        exit;
    }

    // Insere a venda
    $stmt = $conn->prepare("INSERT INTO vendas (cliente, telefone, vendedor_id, total, realizada_em) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param('ssids', $nome_cliente, $tel_cliente, $vendedor, $total, $realizada_em);
    $stmt->execute();
    $venda_id = $conn->insert_id;

    // Insere os itens da venda
    $stmt1 = $conn->prepare("INSERT INTO itens_venda (venda_id, produto_id, quantidade, preco_unitario, subtotal) VALUES (?, ?, ?, ?, ?)");
    foreach ($_SESSION['venda'] as $produto_id => $item) {
        $quantidade = $item['quantidade'];
        $preco      = $item['preco'];
        $subtotal   = $quantidade * $preco;
        $stmt1->bind_param('iiidd', $venda_id, $produto_id, $quantidade, $preco, $subtotal);
        $stmt1->execute();
    }

    // Limpa carrinho
    unset($_SESSION['venda']);
    unset($_SESSION['cliente']);
    unset($_SESSION['telefone']);
    unset($_SESSION['vendedor']);

    header('location: ../../views/vendas.php');
    exit;
}
?>
