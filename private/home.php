<?php
    session_start();
    include '../includes/conexao.php';
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

        .container {
        border:1px solid;
        border-radius:0.5rem;
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

        .icon {
        color:#fff;
        }

        .table.table-striped {
        background: #20252A;
        border:2px solid  #0B5ED7;
        border-radius: 0.4rem;
        overflow: hidden;
        }

        .table.table-striped thead th {
        border-bottom: 2px solid #0B5ED7;
        background:#0B5ED7;
        color:#fff;
        }

        .table.table-striped tbody tr:nth-of-type(odd) td {
        background: #20252a; 
        color: #fff;     
    }

        .table.table-striped tbody tr:nth-of-type(even) td {
        background: #161A1F; 
        color: #fff;     
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

        <div class="container mt-5" style="border:none;">
            <div class="alert alert-primary text-center"> Seja Muito Bem-Vindo(a) <?php echo $_SESSION['nome']; ?> ao seu Sistema de ESTOQUE !</div>
        </div>

        <div class="btn-produto">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTopico"><i class="bi bi-plus-circle"></i> Adicionar Tópico</button>
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
                    <input type="hidden" name="id_topico">
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
                                            <label class="form-label">Preço :</label>
                                            <input type="text" class="form-control" name="preco" placeholder="Preço" required>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Quantidade :</label>
                                            <input type="number" class="form-control" name="quantidade" placeholder="Quantidade" required>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Descrição :</label>
                                            <textarea class="form-control" name="descricao" style="resize:none"  placeholder="Descrição do Produto" required></textarea>
                                        </div>
                                        
                                    <button type="submit" class="btn btn-primary w-100">Adicionar Produto</button>
                            </div>
                </form>
            </div>
        </div>

                <?php 
                $result = $conn->query("SELECT id_topico, nome_topico FROM topicos");
                    while ($topico = $result->fetch_assoc()) {
                        $produtos = $conn->query("SELECT * FROM produtos WHERE topico_id = " . intval($topico['id_topico']));
                    ?>

    <div class="container pb-5 mt-3" style="background: #161A1F">
            <h4 class="my-3" style="color:#fff"> <?php echo htmlspecialchars($topico['nome_topico']); ?> </h4>
            <div class="card-body">
            <table class="table table-striped mb-0">
                <thead>
                    <tr>
                        <th>Produto</th>
                        <th>Preço</th>
                        <th>Quantidade</th>
                        <th>Descrição</th>
                        <th>Última atualização</th>
                        <th>Editar</th>
                        <th>Deletar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($produto = $produtos->fetch_assoc()) { ?>
                        <tr>
                            <td> <?php echo ($produto['nome_produto']); ?> </td>
                            <td> <?php echo 'R$ '. number_format($produto['preco'], 2, ',', '.'); ?> </td>
                            <td> <?php echo $produto['quantidade']; ?> </td>
                            <td> <?php echo ($produto['descricao']); ?> </td>
                            <td> <?php echo $produto['atualizado_em']; ?> </td>
                            <td> <button class="btn"> <span class="icon"><i class="bi bi-pencil-square"></i></span> </button></td>
                            <td> <button class="btn"> <span class="icon"><i class="bi bi-trash3"></i></span> </button></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>

                    <a href="../excluir_topico.php?id_topico=<?php echo $topico['id_topico']; ?>" class="btn btn-primary mt-5"
                    onclick="return removerTopico()"> <i class="bi bi-trash3"> Excluir Tópico </i> </a>

                <button type="button" class="btn btn-primary mt-5" data-bs-toggle="modal" data-bs-target="#modalProduto" onclick="setIdTopico(<?php echo $topico['id_topico']; ?>)"><i class="bi bi-plus-circle"> Adicionar Produto </i></button>

        </div>
    </div>
<?php } ?>

            <footer>
                <div class="text-center"><img src="../assets/img/fundop.png" alt="" width="200rem" height="200rem"></div>
            </footer>

            <script>
                function setIdTopico(id) {
                document.querySelector('input[name="id_topico"]').value = id;
            }

                function removerTopico() {
                return confirm('Você ira fazer a exclusão desse Tópico juntamente com seus produtos, não será possível recuperar os dados após a exclusão.')
                }
            </script>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>

    </body>
</html>