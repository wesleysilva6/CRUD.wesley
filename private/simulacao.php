<?php 
        session_start();
        include '../includes/core/conexao.php';
        date_default_timezone_set('America/Sao_Paulo');

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
    <script src="../assets/javascript/main.js"></script>
    <title>Estoque Aqui - Simular Venda</title>
</head>
    <body style=background:#000;>
        <?php include '../includes/components/sidebar.php' ?>

        <div class="card">
            <div class="card-header text-white">
                <?php if (isset($_GET['produto']) == 'adicionado') { ?>
                    <div class="alert alert-success">Produto adicionado com sucesso</div>
                <?php } ?>
                
                <?php if (isset($_GET['erro']) == 'quantidade') { ?>
                    <div id="" class="alert alert-danger m-3">Quantidade do produto inválida</div>
                <?php } ?>

                <?php if(isset($_GET['quantidade']) == 'limite') { ?>
                    <div class="alert alert-danger m-3">A quantidade adicionada excete o limite disponível no estoque</div>
                <?php } ?>
                
                <?php if(isset($_GET['adicionado']) == 'historico') { ?>
                    <div class="alert alert-success m-3">Simulação concluida com sucesso</div>
                <?php } ?>

                <?php if(isset($_GET['simulacao']) == 'limpa') { ?>
                    <div class="alert alert-success m-3">Simulação limpa com sucesso</div>
                <?php } ?>

                <?php if(isset($_GET['produtos']) == 'inexistentes') { ?>
                    <div class="alert alert-danger m-3">Adicione produtos a está simulação para ela ser limpa</div>
                <?php } ?>
                <h5 class="card-title mt-2">Simulação de Venda</h5>
        </div>

        <form action="../modules/simulacao/adicionar_simulacao.php" method="POST">
            <div class="card-body text-white">
                <label class="form-label">Cliente</label>
                <input type="text" name="nome_cliente" class="form-control w-25 mb-3" placeholder="Nome do Cliente" required>
                <div class="mb-3 d-flex align-items-center gap-3 flex-wrap">
                    <div class="prod">  
                        <label class="form-label">Produto</label>
                        <select name="produto_id" class="form-select" required>
                            <option value="">Selecione um produto</option>
                            <?php
                                $stmt = $conn->prepare("SELECT p.id, p.nome_produto 
                                FROM produtos p
                                INNER JOIN topicos t ON p.topico_id = t.id_topico
                                WHERE t.usuario_id = ?");
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
                            <?php 
                                $total = 0;
                                if (isset($_SESSION['simulacao']) && count($_SESSION['simulacao']) > 0) {
                                foreach ($_SESSION['simulacao'] as $id => $item) {
                                    $stmt = $conn->prepare('SELECT nome_produto, preco FROM produtos WHERE id = ?');
                                    $stmt->bind_param('i', $id);
                                    $stmt->execute();
                                    $result = $stmt->get_result();
                                    if ($result && $result->num_rows > 0) {
                                    $produto = $result->fetch_assoc();
                                        $quantidade = $item['quantidade'];
                                        $subtotal = $produto['preco'] * $quantidade;
                                        $total += $subtotal;
                                        echo "<tr>
                                            <td>{$produto['nome_produto']}</td>
                                            <td>{$quantidade}</td>
                                            <td>R$ " . number_format($produto['preco'], 2, ',', '.') . "</td>
                                            <td>R$ " . number_format($subtotal, 2, ',', '.') . "</td>
                                        </tr>";
                                    }
                                    $stmt->close();
                                }
                            } 
                            ?>
                        </tbody>

                        <tfoot>
                            <tr class="table-dark">
                                <th colspan="3" class="text-end text-white">Subtotal Geral:</th>
                                <th>R$ <?php echo number_format($total, 2, ',', '.'); ?></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

            <form action="../modules/simulacao/finalizar_simulacao.php" method="POST">
                <div class="card-footer d-flex justify-content-center gap-3 mb-4">
                    <button type="submit" class="btn btn-primary">Confirmar Simulação</button>
                    <a href="../modules/simulacao/limpar_simulacao.php" class="btn btn-primary">Limpar Simulação</a>
                </div>
            </form>
        </div>

    <script>
        setTimeout(() => {
            document.querySelectorAll('.alert').forEach(al => {
                al.style.display = 'none'
            })
            history.replaceState(null, '', 'http://localhost:3000/private/simular_venda.php')
        }, 3000);
    </script>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>