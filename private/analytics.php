<?php
        session_start();
        include '../includes/core/conexao.php';
        $usuario_id = $_SESSION['id'];

        if (!isset($_SESSION['id'])) {
        header('Location: ../public/login.php');
        exit;
        }

        // Consulta resumo para os charts
        $resumo = $conn->prepare("SELECT COUNT(*) AS total, SUM(preco*quantidade) AS valor FROM itens_simulacao it JOIN simulacoes s ON it.id_simulacao = s.id WHERE s.usuario_id = ? ");
        $resumo->bind_param('i',$usuario_id);
        $resumo->execute();
        $dadosResumo = $resumo->get_result()->fetch_assoc();

        // Gráfico de simulações por dia da semana
        $chartDias = $conn->prepare("SELECT DAYNAME(s.criada_em) AS dia, COUNT(*) AS qtd FROM simulacoes s WHERE s.usuario_id = ? GROUP BY dia ORDER BY FIELD(DAYNAME(s.criada_em), 'Sunday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Monday')");
        $chartDias->bind_param('i',$usuario_id);
        $chartDias->execute();
        $resDias = $chartDias->get_result();

        $traducao = [
        'Sunday'    => 'Domingo',
        'Monday'    => 'Segunda-feira',
        'Tuesday'   => 'Terça-feira',
        'Wednesday' => 'Quarta-feira',
        'Thursday'  => 'Quinta-feira',
        'Friday'    => 'Sexta-feira',
        'Saturday'  => 'Sábado'
        ];

    $dias = $qtds = [];
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
    <link rel="shortcut icon" href="../assets/img/favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/analytics.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Estoque Aqui - Analytics</title>
</head>
    <body>
        <?php include '../includes/components/sidebar.php'; ?>

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

            <script src="../assets/js/analytics.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
