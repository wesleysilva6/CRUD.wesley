<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="../../assets/css/sidebar.css">
</head>
<body>        
    <nav class="navbar" data-bs-theme="dark">
            <div class="container-fluid">
                <button class="btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
                    <i class="bi bi-list"></i>
                </button>
                <a href="home.php" class="navbar-brand mx-auto">
                    <img src="../assets/img/logo_stexto.png" width="65" height="65" alt="">
                    <img src="../assets/img/fundop2.png" alt="" width="85" height="65">
                </a>
            </div>
    </nav>

        <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
            <div class="offcanvas-header">
                <img src="../assets/img/logo_branca.png" width="120rem" class="mx-auto d-block">
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>

            <div class="offcanvas-body d-flex flex-column align-items-start">
                <h5 class="text-white w-100 text-center mb-4">Dashboard ESTOQUE AQUI</h5>
                <li><a href="../private/home.php" class="text-white mb-3 fs-5 nav-link"><i class="bi bi-house-door-fill"></i>Dashboard</a></li>
                <li><a href="../private/simulacao.php" class="text-white mb-3 fs-5 nav-link"><i class="bi bi-box-seam-fill"></i>Simular Venda</a></li>
                <li><a href="../private/historico.php" class="text-white mb-3 fs-5 nav-link"><i class="bi bi-clipboard-data-fill"></i>Histórico</a></li>
                <li><a href="../includes/core/deslogar.php" class="text-white mb-3 fs-5 nav-link"><i class="bi bi-box-arrow-left"></i>Sair</a></li>
            </div>
        </div>
</body>
</html>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
