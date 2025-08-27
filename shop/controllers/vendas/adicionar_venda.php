<?php
session_start();
require_once '../../../includes/core/conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome_cliente = $_POST['nome_cliente'];
    $tel_cliente  = $_POST['tel_cliente'];
    $vendedor     = $_POST['vendedor'];
    $produto_id   = $_POST['produtoSelecionado']; // corrigido
    $quantidade   = (int) $_POST['quantidadeSelecionada'];

    // Guarda dados do cliente e vendedor na sessão
    $_SESSION['cliente']  = $nome_cliente;
    $_SESSION['telefone'] = $tel_cliente;
    $_SESSION['vendedor'] = $vendedor;

    $stmt = $conn->prepare("SELECT nome_produto, preco, quantidade FROM produtos WHERE id = ?");
    $stmt->bind_param('i', $produto_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $produto = $result->fetch_assoc();

        $quantidade_venda = isset($_SESSION['venda'][$produto_id]) ? $_SESSION['venda'][$produto_id]['quantidade'] : 0;
        $quantidade_total = $quantidade_venda + $quantidade;

        if ($quantidade_total <= $produto['quantidade']) {
            if (!isset($_SESSION['venda'])) {
                $_SESSION['venda'] = [];
            }

            if (isset($_SESSION['venda'][$produto_id])) {
                $_SESSION['venda'][$produto_id]['quantidade'] += $quantidade;
            } else {
                $_SESSION['venda'][$produto_id] = [
                    'nome_produto' => $produto['nome_produto'],
                    'preco'        => $produto['preco'],
                    'quantidade'   => $quantidade
                ];
            }
        }
    }

    header('location: ../../views/vendas.php?produto=adicionado');
    exit;
}
?>
