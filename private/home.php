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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <title>Estoque Aqui - Dashboard</title>

    <style>
        ::-webkit-scrollbar {
        width: 8px;
        }

        ::-webkit-scrollbar-thumb {
        background:  #0B5ED7;
        }

        .navbar {
        background-color: #0C0F16;
        }

        .btn-produto {
        margin:7rem 19.4rem 0 0;
        text-align:end;
        }

        .modal-content {
        border-radius:4rem;
        }

        .modal-header {
        background-color: #161A1F;
        border-bottom:1px solid #000;
        }

        .modal-body {
        background-color: #161A1F;
        }

        .form-control {
        color: #fff;
        background-color: #20252A;
        border: 1px solid #393E42;
        }

        .form-control::placeholder {
        color:rgba(255, 255, 255, 0.76); 
        }

        .form-control:focus {
        background-color: #20252A;
        color:#fff;
        border-color: #393E42;
        box-shadow: none;
        outline: none;
        }

        footer {
        background: #0C0F16;
        padding: 1rem 4%;
        margin: 50rem 0 0 0;
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

        <div class="btn-produto">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTopico"><i class="bi bi-plus-circle"></i> Adicionar Tópico</button>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalProduto"><i class="bi bi-plus-circle"></i> Adicionar Produto</button>
        </div>

        <div class="modal fade" id="modalTopico" tabindex="-1">
            <div class="modal-dialog">
                <form action="../add_topico.php" method="POST" class="modal-content">
                    <div class="modal-header text-white">
                        <h5 class="modal-tittle text-white">Adicionar Tópico :</h5>
                        <button type="button" class="btn-close-white btn-close" data-bs-dismiss="modal"></button>
                    </div>
                        <div class="modal-body text-white">
                            <div class="mb-3">
                                <label for="nome_topico">Nome do Tópico :</label>
                                <input type="text" class="form-control" name="nome_topico" placeholder="Nome do Tópico" required>
                            </div>
                                <button type="submit" class="btn btn-primary w-100">Adicionar Tópico</button>
                        </div>
                </form>
            </div>
        </div>
        

        <div class="modal fade" id="modalProduto" tabindex="-1">
            <div class="modal-dialog">

                <form action="../src/adicionar_produto.php" method="POST" class="modal-content" enctype="multipart/form-data">
                        <div class="modal-header text-white">
                            <h5 class="modal-tittle text-white">Adicionar Produto</h5>
                            <button type="button" class="btn-close-white btn-close" data-bs-dismiss="modal"></button>
                        </div>
                            <div class="modal-body text-white">

                                        <div class="mb-3">
                                            <label class="form-label">Nome do Produto :</label>
                                            <input type="text" class="form-control" name="nome_produto" placeholder="Nome do Produto" required>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Quantidade :</label>
                                            <input type="number" class="form-control" name="quantidade_produto" placeholder="Quantidade" required>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Descrição :</label>
                                            <textarea class="form-control" name="descricao_produto" style="resize:none"  placeholder="Descrição do Produto" required></textarea>
                                        </div>
                                        
                                    <button type="submit" class="btn btn-primary w-100">Adicionar Produto</button>
                            </div>
                </form>
            </div>
        </div>

            <footer>
                <div class="text-center"><img src="../assets/img/fundop.png" alt="" width="200rem" height="200rem"></div>
            </footer>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    </body>
</html>