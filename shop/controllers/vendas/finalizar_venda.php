<?php 
require_once '../../../includes/core/conexao.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../../views/vendas.php?erro=metodo_invalido');
    exit;
}

$nome_cliente = $_SESSION['cliente']  ?? 'Cliente não informado';
$tel_cliente  = $_SESSION['telefone'] ?? '';
$vendedor     = $_SESSION['vendedor'] ?? null;
$realizada_em = date('Y-m-d H:i:s');

$total = 0.0;
if (!empty($_SESSION['venda'])) {
    foreach ($_SESSION['venda'] as $produto_id => $item) {
        $total += (float)$item['preco'] * (int)$item['quantidade'];
    }
}

if (empty($_SESSION['venda']) || $total <= 0) {
    header('Location: ../../views/vendas.php?erro=simulacao_vazia');
    exit;
}

// insere venda
$stmt = $conn->prepare("INSERT INTO vendas (cliente, telefone, vendedor_id, total, realizada_em) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param('ssids', $nome_cliente, $tel_cliente, $vendedor, $total, $realizada_em);
$stmt->execute();
$venda_id = $conn->insert_id;
$stmt->close();

// insere itens
$stmt1 = $conn->prepare("INSERT INTO itens_venda (venda_id, produto_id, quantidade, preco_unitario, subtotal) VALUES (?, ?, ?, ?, ?)");
foreach ($_SESSION['venda'] as $produto_id => $item) {
    $qtd = (int)$item['quantidade'];
    $preco = (float)$item['preco'];
    $subtotal = $qtd * $preco;
    $stmt1->bind_param('iiidd', $venda_id, $produto_id, $qtd, $preco, $subtotal);
    $stmt1->execute();

    // (opcional) baixa estoque
    $upd = $conn->prepare("UPDATE produtos SET quantidade = quantidade - ? WHERE id = ?");
    $upd->bind_param('ii', $qtd, $produto_id);
    $upd->execute();
    $upd->close();
}
$stmt1->close();

// limpa sessão
unset($_SESSION['venda'], $_SESSION['cliente'], $_SESSION['telefone'], $_SESSION['vendedor']);

header('Location: ../../views/vendas.php?venda_finalizada');
exit;
