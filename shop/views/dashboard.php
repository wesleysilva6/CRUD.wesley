<?php
    session_start();
    require_once '../../includes/core/conexao.php';

    date_default_timezone_set('America/Sao_Paulo');
    $usuario_id = $_SESSION['id'];

    if (!isset($_SESSION['id'])) {
        header('Location: ../../public/login.php?erro=acesso_negado');
        exit;
    }

    $sqlResumo = "SELECT COUNT(p.id) AS total_produtos, COALESCE(SUM(p.quantidade), 0) AS total_unidades FROM produtos p INNER JOIN topicos t ON p.topico_id = t.id_topico WHERE t.usuario_id = ?";

    $stmtResumo = $conn->prepare($sqlResumo);
    $stmtResumo->bind_param("i", $usuario_id);
    $stmtResumo->execute();
    $dadosResumo = $stmtResumo->get_result()->fetch_assoc();

    $total_produtos  = (int)($dadosResumo['total_produtos'] ?? 0);   // qtd de registros
    $total_unidades  = (int)($dadosResumo['total_unidades'] ?? 0);   // soma das unidades

    $sqlProdutos = "SELECT p.id, p.nome_produto, p.preco, p.quantidade FROM produtos p INNER JOIN topicos t ON p.topico_id = t.id_topico WHERE t.usuario_id = ?";

    $stmtProdutos = $conn->prepare($sqlProdutos);
    $stmtProdutos->bind_param("i", $usuario_id);
    $stmtProdutos->execute();
    $produtos = $stmtProdutos->get_result();

    $sqlEstoqueBaixo = "SELECT COUNT(*) AS produtos_estoque_baixo FROM produtos p INNER JOIN topicos t ON p.topico_id = t.id_topico WHERE t.usuario_id = ? AND p.quantidade < 10";

    $stmtEstoqueBaixo = $conn->prepare($sqlEstoqueBaixo);
    $stmtEstoqueBaixo->bind_param("i", $usuario_id);
    $stmtEstoqueBaixo->execute();
    $dadosEstoqueBaixo = $stmtEstoqueBaixo->get_result()->fetch_assoc();

    $produtos_estoque_baixo = (int)($dadosEstoqueBaixo['produtos_estoque_baixo'] ?? 0);

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../../public/assets/img/favicon.ico" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Painel de Vendas - Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <?php include '../includes/components/sidebar.php' ?>

    <div class="content" id="content">
            <div class="dash d-flex justify-content-between align-items-center mb-4">
                <button id="toggleSidebar"><i class="bi bi-arrow-bar-left"></i></button>
                <h2>Dashboard</h2>
                <div class="d-flex align-items-center">
                    <input type="text" class="form-control me-2" placeholder="Pesquisar">
                    <i class="bi bi-person-circle fs-4"></i>
                </div>
            </div>

        <div class="row g-3 mb-4">
            <div class="col-md-3">
                <div class="card p-3 text-center">
                    <h6>Vendas de Hoje</h6>
                    <h4 class="text-success"> R$ 1.902,00</h4>
                </div>
            </div>

        <div class="col-md-3">
            <div class="card p-3 text-center">
                <h6>Vendas do Mês</h6>
                <h4 class="text-primary"> R$ 18.230,00</h4>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card p-3 text-center">
                <h6>Produtos Disponíveis</h6>
                <h4 class="text-success"> <?php echo $total_produtos; ?> </h4>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card p-3 text-center">
                <h6>Estoque Baixo</h6>
                <h4>
                    <i class="bi bi-exclamation-triangle text-warning"></i>
                    <span><?php echo $total_unidades; ?></span> <span class="text-danger"><?php echo $produtos_estoque_baixo; ?></span>
                </h4>
            </div>
        </div>

    <div class="row g-3">
        <div class="col-md-6">
            <div class="card p-3">
            <h6 class="mb-3">Gerenciar Vendas</h6>

            <table class="table">
                <thead>
                <tr>
                    <th>Produto</th>
                    <th>Preço</th>
                    <th>Estoque</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
            </div>
        </div>

            <div class="col-md-6">
                <div class="card p-3">
                    <h6 class="mb-3">Estoque - Quantidade de Produtos</h6>
            <table class="table">
                <thead>
                <tr>
                    <th>Produto</th>
                    <th>Preço</th>
                    <th>Estoque</th>
                    <th>Ações</th>
                </tr>
                </thead>
                    <tbody>
                    <?php if ($produtos && $produtos->num_rows > 0): ?>
                        <?php while ($produto = $produtos->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($produto['nome_produto']); ?></td>
                                <td>R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?></td>
                                <td><?php echo $produto['quantidade']; ?></td>
                                <td>
                                    <button class="btn btn-sm btn-primary">Selecionar</button>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" class="text-center">Nenhum produto cadastrado</td>
                        </tr>
                    <?php endif; ?>
                    </tbody>
            </table>                
        </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const sidebar = document.getElementById('sidebar');
        const content = document.getElementById('content');
        document.getElementById('toggleSidebar').addEventListener('click', () => {
        sidebar.classList.toggle('collapsed');
        content.classList.toggle('expanded');
    });
    </script>
</body>
</html>