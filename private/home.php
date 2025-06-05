<?php
    session_start();
    date_default_timezone_set('America/Sao_Paulo');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../assets/img/favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <title>Estoque Aqui - Dashboard</title>

    <style>
        .navbar {
        background-color: #0C0F16;
        }

        .card-produto {
        padding: 13rem 0 0 0;
        width: 50rem;
        margin: 0 auto;
    }

        input:focus, .form-control:focus {
        box-shadow: none;
        outline: none;
    }
    </style>


</head>
    <body style="background:#000">
        <nav class="navbar" data-bs-theme="dark">
            <div class="container-fluid">
                <a href="home.php" class="navbar-brand">
                <img src="../assets/img/logo_stexto.png" width="65" height="65" alt=""> <img src="../assets/img/fundop2.png" alt="" width="85" height="65">
                </a>
                <ul class="navbar-nav">
                    <li class="nav-item"><a href="../includes/deslogar.php" class="nav-link">Sair</a></li>
                </ul>
            </div>
        </nav>

        <div class="container mt-5">
            <div class="alert alert-success text-center"> Seja Muito Bem-Vindo(a) <?php echo $_SESSION['nome']; ?> ao seu Sistema de ESTOQUE !</div>
        </div>

        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalProduto">Adicionar Produto</button>

        <div class="modal fade" id="modalProduto" tabindex="-1">
            <div class="modal-dialog">

                <form action="../src/adicionar_produto.php" method="POST" class="modal-content">
                        <div class="modal-header bg-dark text-white">
                            <h5 class="modal-tittle">Adicionar Produto</h5>
                            <button type="button" class="btn-close-white btn-close" data-bs-dismiss="modal"></button>
                        </div>
                            <div class="modal-body bg-dark text-white">
                                        <div class="mb-3">
                                            <label class="form-label">Adicionar Produto:</label>
                                            <input type="text" class="form-control" name="nome_produto" placeholder="Nome do Produto" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Quantidade</label>
                                            <input type="number" class="form-control" name="quantidade_produto" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Descrição</label>
                                            <textarea class="form-control" id="" placeholder="Descrição do Produto" required></textarea>
                                        </div>
                                        <div class="modal-footer">
                                            
                                            <button type="submit" class="btn btn-info w-100 mt-3">Adicionar Produto</button>
                                        </div>
                            </div>
                </form>
            </div>
        </div>





            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    </body>
</html>