<?php
        session_start();
        require_once '../../includes/core/conexao.php';

        date_default_timezone_set('America/Sao_Paulo');

        if (!isset($_SESSION['id'])) {
        header('Location: ../../public/login.php?erro=acesso_negado');
        exit;
        }
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

    <div class="content">
            <div class="dash d-flex justify-content-between align-items-center mb-4">
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
                <h4 class="text-success"> 78</h4>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card p-3 text-center">
                <h6>Estoque Baixo</h6>
                <h4><i class="bi bi-exclamation-triangle text-warning"></i> 5 <span class="text-danger">32</span></h4>
            </div>
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
                <tr>
                    <td>Produto 1</td>
                    <td>R$ 50,00</td>
                    <td>15</td>
                    <td><button class="btn btn-sm btn-primary">Selecionar</button></td>
                </tr>

                <tr>
                    <td>Produto 2</td>
                    <td>R$ 75,00</td>
                    <td>3</td>
                    <td><button class="btn btn-sm btn-primary">Selecionar</button></td>
                </tr>

                <tr>
                    <td>Produto 3</td>
                    <td>R$ 30,00</td>
                    <td>10</td>
                    <td><button class="btn btn-sm btn-primary">Selecionar</button></td>
                </tr>

                <tr>
                    <td>Produto 4</td>
                    <td>R$ 100,00</td>
                    <td>0</td>
                    <td><button class="btn btn-sm btn-primary">Selecionar</button></td>
                </tr>
                </tbody>
            </table>
            </div>
        </div>

            <div class="col-md-6">
                <div class="card p-3">
                    <h6 class="mb-3">Estoque - Quantidade de Produtos</h6>
                    <canvas id="estoqueChart" height="200"></canvas>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>