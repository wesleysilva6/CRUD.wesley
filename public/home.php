<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <title>APP ????</title>
</head>
    <body style="background:black">

        <nav class="navbar navbar-dark bg-dark">
            <div class="container-fluid">
                <a href="home.php" class="navbar-brand">
                <img src="../assets/img/logo.png" width="30" height="30" alt="">
                APP ???
                </a>
                <ul class="navbar-nav">
                    <li class="nav-item"><a href="deslogar.php" class="nav-link">Sair</a></li>
                </ul>
            </div>
        </nav>
        
        <div class="container mt-5">
    <div class="alert alert-success text-center">
        SEJA MUITO BEM VINDO <?php echo $_SESSION['usuario_nome']; ?> AO SEU SISTEMA DE ??
    </div>
</div>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    </body>
</html>