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
    <title>Painel de Vendas - Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/vendas.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <script src="../assets/js/core/main.js" defer></script>
</head>
<body>
    <?php include '../includes/components/sidebar.php' ?>
        <div class="content" id="content">
            <div class="dash d-flex justify-content-between align-items-center mb-4">
                <button id="toggleSidebar"><i class="bi bi-arrow-bar-left"></i></button>
                <h2>Realizar Venda</h2>
                <div class="d-flex align-items-center">
                    <input type="text" class="form-control me-2" placeholder="Pesquisar">
                    <?php $foto = isset($_SESSION['foto']) && $_SESSION['foto'] !== '' ? $_SESSION['foto'] : 'user.png'; $caminho = "../../../uploads/" . $foto; ?>
                    <img src="<?php echo $caminho; ?>" alt="Foto de Perfil" class="rounded-circle" width="40" height="40">
                </div>
            </div>

            <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="text-center mt-2">Nova Venda</h5>
                    </div>
                    <div class="card-body">
                        <form action="../controllers/vendas/adicionar_venda.php" method="POST" id="formVenda">
                            <div class="mb-3">
                                <label for="nomeCliente" class="form-label">Cliente</label>
                                <input type="text" id="nomeCliente" name="nome_cliente" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="telCliente" class="form-label">Telefone</label>
                                <input type="text" id="telCliente" name="tel_cliente" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="vendedor" class="form-label">Vendedor</label>
                                <select id="vendedor" name="vendedor" class="form-select">
                                    <option value="">Selecione um Vendedor</option>
                                    <option value="">Wesley</option>
                                </select>
                            </div>

                            <hr>

                            <div class="mb-3">
                                <label for="produto" class="form-label">Produto</label>
                                <select id="produto" name="produto" class="form-select">
                                    <option value="">Selecione um Produto</option>
                                        <?php
                                            $stmt = $conn->prepare(
                                            "SELECT p.id, p.nome_produto, p.quantidade, p.preco, p.imagem, p.descricao
                                            FROM produtos p
                                            INNER JOIN topicos t ON p.topico_id = t.id_topico
                                            WHERE t.usuario_id = ?");
                                            $stmt->bind_param("i", $usuario_id);
                                            $stmt->execute();
                                            $result = $stmt->get_result();
                                            while ($produto = $result->fetch_assoc()) {
                                                $precoFormatado = number_format($produto['preco'], 2, ',', '.'); 
                                                echo "<option value='{$produto['id']}' 
                                                    data-quantidade='{$produto['quantidade']}'
                                                    data-preco='{$precoFormatado}'
                                                    data-descricao='{$produto['descricao']}'
                                                    data-preco-raw='{$produto['preco']}'
                                                    data-foto='../../../uploads/{$produto['imagem']}'>
                                                    {$produto['nome_produto']}
                                                </option>";
                                            }
                                        ?>
                                </select>
                            </div>

                            <div id="detalhesProduto" style="display:none;">
                                <img id="previewProduto" src="" alt="Imagem do Produto" class="img-thumbnail mb-2" style="max-width:120px;">
                                <p><strong>Preço: </strong> R$ <span id="precoProduto"></span></p>
                                <p><strong>Descrição: </strong> <span id="descProduto"></span></p>
                                <label>Quantidade</label>
                                <input type="number" name="quantidade" id="quantidade" class="form-control" min="1" value="1">

                                <button type="submit" class="btn btn-success mt-2" id="adicionarCarrinho">Adicionar ao Carrinho</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Coluna direita - Carrinho -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">   
                        <h5 class="text-center">Carrinho</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Produto</th>
                                    <th>Qtd</th>
                                    <th>Preço</th>
                                    <th>Total</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody id="carrinhoLista">
                                <tr>
                                    <?php
                                    $total = 0;
                                    if (isset($_SESSION['venda']) && count($_SESSION['venda']) > 0) {
                                    foreach ($_SESSION['venda'] as $id => $item) {
                                        $stmt = $conn->prepare("SELECT nome_produto, preco FROM produtos WHERE id = ?");
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
                                } ?>
                                
                                </tr>
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-between mt-3">
                            <h5>Total:</h5>
                            <h5 id="totalVenda">R$ <?= number_format($total, 2, ',', '.') ?></h5>
                        </div>
                            <form action="../controllers/vendas/finalizar_venda.php" method="POST">
                                <button type="submit" class="btn btn-primary w-100 mt-3">Finalizar Venda</button>
                            </form>
                    </div>
                </div>
            </div>
            </div>

        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('produto').addEventListener('change', function () {
            const option = this.options[this.selectedIndex];
            if (option.value !== "") {
                const preco = option.getAttribute('data-preco');
                const foto = option.getAttribute('data-foto');
                const qtd = option.getAttribute('data-quantidade');
                const desc = option.getAttribute('data-descricao')

                document.getElementById('detalhesProduto').style.display = 'block';
                document.getElementById('precoProduto').innerText = preco;
                document.getElementById('descProduto').innerText = desc;
                document.getElementById('previewProduto').src = foto;
                document.getElementById('quantidade').max = qtd; // limite até o estoque disponível
            } else {
                document.getElementById('detalhesProduto').style.display = 'none';
            }
        });
  document.getElementById('produto').addEventListener('change', function () {
    const option = this.options[this.selectedIndex];
    const det = document.getElementById('detalhesProduto');
    if (!option.value) { det.style.display = 'none'; return; }

    document.getElementById('precoProduto').innerText = option.getAttribute('data-preco');
    document.getElementById('descProduto').innerText  = option.getAttribute('data-descricao');
    document.getElementById('previewProduto').src     = option.getAttribute('data-foto');
    document.getElementById('quantidade').max         = option.getAttribute('data-quantidade');
    det.style.display = 'block';
  });

</script>
</body>
</html>
