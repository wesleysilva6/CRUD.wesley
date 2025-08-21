<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/sidebar.css">
</head>
<body>
    <nav class="navbar">
            <div class="container-fluid">
                <button class="btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
                    <i class="bi bi-list"></i>
                </button>
                <div class="navbar-brand mx-auto">
                    <h3>Dashboard</h3>
                </div>
            </div>
    </nav>

        <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
            <div class="offcanvas-header">
                <img src="../public/assets/img/logo_branca.png" width="120rem" class="mx-auto d-block">
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>

            <div class="offcanvas-body d-flex flex-column align-items-start">
                <h5 class="text-white w-100 text-center mb-4">Dashboard ESTOQUE AQUI</h5>
                <li><a href="../shop/views/dashboard.php" class="text-white mb-3 fs-5 nav-link"><i class="bi bi-person-circle"></i>Meu Perfil</a></li>
                <li><a href="../private/perfil.php" class="text-white mb-3 fs-5 nav-link"><i class="bi bi-person-circle"></i>Meu Perfil</a></li>
                <li><a href="../private/home.php" class="text-white mb-3 fs-5 nav-link"><i class="bi bi-house-door-fill"></i>Dashboard</a></li>
                <li><a href="../private/simulacao.php" class="text-white mb-3 fs-5 nav-link"><i class="bi bi-box-seam-fill"></i>Simular Venda</a></li>
                <li><a href="../private/historico.php" class="text-white mb-3 fs-5 nav-link"><i class="bi bi-clipboard-data-fill"></i>Histórico</a></li>
                <li><a href="../private/analytics.php" class="text-white mb-3 fs-5 nav-link"><i class="bi bi-bar-chart-line-fill"></i>Estatisticas</a></li>
                <li><a href="../includes/core/deslogar.php" class="text-white mb-3 fs-5 nav-link"><i class="bi bi-box-arrow-left"></i>Sair</a></li>
            </div>
        </div>
</body>
</html>

