<?php
session_start();
require_once '../../../includes/core/conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome_cliente = trim($_POST['nome_cliente'] ?? '');
    $tel_cliente  = trim($_POST['tel_cliente']  ?? '');
    $vendedor     = $_POST['vendedor'] ?? null;

    $produto_id = (int)($_POST['produto'] ?? 0);
    $quantidade = (int)($_POST['quantidade'] ?? 0);

    // guarda dados básicos na sessão
    $_SESSION['cliente']  = $nome_cliente;
    $_SESSION['telefone'] = $tel_cliente;
    $_SESSION['vendedor'] = $vendedor;

    if ($produto_id <= 0 || $quantidade <= 0) {
        header('Location: ../../views/vendas.php?erro=dados_invalidos');
        exit;
    }

    $stmt = $conn->prepare("SELECT nome_produto, preco, quantidade FROM produtos WHERE id = ?");
    $stmt->bind_param('i', $produto_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if (!$result || $result->num_rows === 0) {
        header('Location: ../../views/vendas.php?erro=produto_inexistente');
        exit;
    }

    $produto = $result->fetch_assoc();
    $em_carrinho = isset($_SESSION['venda'][$produto_id]) ? (int)$_SESSION['venda'][$produto_id]['quantidade'] : 0;
    $quantidade_total = $em_carrinho + $quantidade;

    if ($quantidade_total > (int)$produto['quantidade']) {
        header('Location: ../../views/vendas.php?erro=estoque_insuficiente');
        exit;
    }

    if (!isset($_SESSION['venda'])) $_SESSION['venda'] = [];

    if (isset($_SESSION['venda'][$produto_id])) {
        $_SESSION['venda'][$produto_id]['quantidade'] += $quantidade;
    } else {
        $_SESSION['venda'][$produto_id] = [
            'nome_produto' => $produto['nome_produto'],
            'preco'        => (float)$produto['preco'],
            'quantidade'   => $quantidade
        ];
    }

    header('Location: ../../views/vendas.php');
    exit;
}
