<?php
        session_start();
        require_once __DIR__ . '/../includes/core/bootstrap.php';
        require_once '../includes/core/conexao.php';

        $usuario_id = $_SESSION['id'];

        if (!isset($_SESSION['id'])) {
        header('Location: ../public/login.php?erro=acesso_negado');
        exit;
        }

        // Consulta resumo para os charts
        $resumo = $conn->prepare("SELECT COUNT(*) AS total, SUM(preco*quantidade) AS valor FROM itens_simulacao it JOIN simulacoes s ON it.id_simulacao = s.id WHERE s.usuario_id = ? ");
        $resumo->bind_param('i',$usuario_id);
        $resumo->execute();
        $dadosResumo = $resumo->get_result()->fetch_assoc();

        $chartDias = $conn->prepare("SELECT DATE_FORMAT(s.criada_em, '%d/%m') AS dia, COUNT(*) AS qtd FROM simulacoes s WHERE s.usuario_id = ? GROUP BY dia ORDER BY dia ASC");
        $chartDias->bind_param('i',$usuario_id);
        $chartDias->execute();
        $resDias = $chartDias->get_result();

    $qtds = [];
        while($r = $resDias->fetch_assoc()){
            $dias[] = $traducao[$r['dia']] ?? $r['dia']; // traduz
            $qtds[] = $r['qtd'];
        }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../public/assets/img/favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../public/assets/css/analytics.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Estoque Aqui - Analytics</title>
</head>
    <body>
        <?php view('sidebar') ?>

    <div class="container dashboard-container">
        <h2 class="dashboard-title">📊 Analytics Geral</h2>

        <div class="row g-4">
            <div class="col-md-6">
                <div class="card">
                    <h5>Simulações por Dia</h5>
                    <canvas id="chartSimulacoesDia"></canvas>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <h5>Resumo Geral</h5>
                    <canvas id="chartResumo"></canvas>
                </div>
            </div>
        </div>
    </div>

        <script>
            const chartDiasLabels = <?= json_encode($dias) ?>;
            const chartDiasData = <?= json_encode($qtds) ?>;
            const chartResumoData = [<?= intval($dadosResumo['total']) ?>, <?= floatval($dadosResumo['valor']) ?>];
        </script>

            <script src="../public/assets/js/pages/analytics.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
