<?php 
    include '../includes/core/conexao.php';
    date_default_timezone_set('America/Sao_Paulo');
    session_start();

    if (!isset($_SESSION['id'])) {
        header('Location: ../public/login.php?erro=acesso_negado');
        exit;
    }

    $usuario_id = $_SESSION['id'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estoque Aqui - Histórico</title>
    <link rel="shortcut icon" href="../assets/img/favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../assets/css/simular.css">
    <link rel="stylesheet" href="../assets/css/sidebar.css">
</head>
<body style="background:#000;">

    <?php include '../includes/components/sidebar.php'; ?>

</body>
</html>
