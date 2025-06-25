<?php 
    include '../includes/conexao.php';
    session_start();

    $usuario_id = $_SESSION['id'];
    if (!isset($_SESSION['id'])) {
    header('Location: ../public/login.php?erro=acesso_negado');
    exit;
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
    <link rel="stylesheet" href="../assets/css/simular.css">
    <script src="../assets/javascript/simulacao.js"></script>
    <title>Estoque Aqui - Dashboard</title>
</head>
    <body style=background:#000;>
        <nav class="navbar" data-bs-theme="dark">
            <div class="container-fluid">
                <a href="../private/simular_venda.php" class="navbar-brand">
                <img src="../assets/img/logo_stexto.png" width="65" height="65" alt=""> <img src="../assets/img/fundop2.png" alt="" width="85" height="65">
                </a>
                <ul class="navbar-nav">
                    <li class="nav-item"><a href="../private/home.php" class="nav-link">Voltar</a></li>
                </ul>
            </div>
        </nav>


        <div class="card">
            <div class="card-header text-white">
                <h5 class="card-title mt-2">Simulação de Venda</h5>
            </div>

        <form action="../src/simulacao/adicionar_simulacao.php" method="POST">
            <div class="card-body text-white">
                <div class="mb-3 d-flex align-items-center gap-3 flex-wrap">
                    <div class="prod">
                        <label class="form-label">Produto</label>
                        <select name="produto_id" class="form-select" required>
                            <option value="">Selecione um produto</option>
                            <?php
                                $sql = "
                                    SELECT p.id, p.nome_produto 
                                    FROM produtos p
                                    INNER JOIN topicos t ON p.topico_id = t.id_topico
                                    WHERE t.usuario_id = ?
                                ";
                                $stmt = $conn->prepare($sql);
                                $stmt->bind_param("i", $usuario_id);
                                $stmt->execute();
                                $result = $stmt->get_result();
                                while ($produto = $result->fetch_assoc()) {
                                    echo "<option value='{$produto['id']}'>{$produto['nome_produto']}</option>";
                                }
                            ?>
                        </select>
                    </div>

                    <div>
                        <label class="form-label">Quantidade</label>
                        <input type="number" name="quantidade" class="form-control" placeholder="Informe a Quantidade" required>
                    </div>

                    <div class="mt-auto">
                        <button type="submit" class="btn btn-primary">Adicionar à Simulação</button>
                    </div>
                </div>
        </form>

                <div class="mb-3">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Quantidade</th>
                                <th>Preço Unitário</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                            </tr>

                            <tr>
                            </tr>

                        </tbody>
                    </table>
                </div>
        </div>

            <div class="card-footer d-flex justify-content-center gap-3 mb-4">
                <a href="" class="btn btn-primary">Confirmar Venda</a>
                <a href="" class="btn btn-primary">Limpar Simulação</a>
                <a href="" class="btn btn-primary">Gerar PDF/Excel</a>
            </div>
        </div>

    <?php 
    //include '../includes/partials/footer.php';
    ?>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>