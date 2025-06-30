<?php 
include '../../includes/core/conexao.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['cliente'] = $_POST['nome_cliente'];
    $produto_id = intval($_POST['produto_id']);
    $quantidade = intval($_POST['quantidade']);

    if ($produto_id <= 0 || $quantidade <= 0) {
        header('Location: ../../private/simular_venda.php?erro=quantidade_produto');
        exit;
    }

    // Consulta o produto pelo ID
    $stmt = $conn->prepare('SELECT nome_produto, preco, quantidade FROM produtos WHERE id = ?');
    $stmt->bind_param('i', $produto_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $produto = $result->fetch_assoc();

        // Quantidade já simulada anteriormente (se houver)
        $quantidade_simulada = 0;
        if (isset($_SESSION['simulacao'][$produto_id])) {
            $quantidade_simulada = $_SESSION['simulacao'][$produto_id]['quantidade'];
        }

        $quantidade_total = $quantidade_simulada + $quantidade;

        if ($quantidade_total <= $produto['quantidade']) {
            // Inicia sessão se necessário
            if (!isset($_SESSION['simulacao'])) {
                $_SESSION['simulacao'] = [];
            }

            // Adiciona ou atualiza produto na simulação
            if (isset($_SESSION['simulacao'][$produto_id])) {
                $_SESSION['simulacao'][$produto_id]['quantidade'] += $quantidade;
            } else {
                $_SESSION['simulacao'][$produto_id] = [
                    'nome_produto' => $produto['nome_produto'],
                    'preco' => $produto['preco'],
                    'quantidade' => $quantidade
                ];
            }
        } else {
            header('location: ../../private/simular_venda.php?quantidade=limite_excedida');
            exit;
        } 
    }
        header('Location: ../../private/simular_venda.php?produto=adicionado');
        exit;
    }
?>