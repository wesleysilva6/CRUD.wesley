<?php
    session_start();
    require_once '../../includes/core/conexao.php';

    $usuario_id = $_SESSION['id'];

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
    <title>Painel de Vendas - Estoque</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <script src="../assets/js/core/main.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>
<body>
    <?php include '../includes/components/sidebar.php' ?>
        <div class="content" id="content">
            <div class="dash d-flex justify-content-between align-items-center mb-4">
                <button id="toggleSidebar"><i class="bi bi-arrow-bar-left"></i></button>
                <h2>Estoque de Produtos</h2>
                <div class="d-flex align-items-center">
                    <input type="text" class="form-control me-2" placeholder="Pesquisar">
                    <?php $foto = isset($_SESSION['foto']) && $_SESSION['foto'] !== '' ? $_SESSION['foto'] : 'user.png'; $caminho = "../../../uploads/" . $foto; ?>
                    <img src="<?php echo $caminho; ?>" alt="Foto de Perfil" class="rounded-circle" width="40" height="40">
                </div>
            </div>

            <div class="col-md-12">
                <div class="container">
                </div>
            </div>

</script>
</body>
</html>