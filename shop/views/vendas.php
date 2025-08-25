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
                <h2></h2>
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
                        <form>
                            <div class="mb-3">
                                <label for="nomeCliente" class="form-label">Cliente</label>
                                <input type="text" id="nomeCliente" name="nome_cliente" class="form-control" placeholder="Nome do Cliente" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="vendedor" class="form-label">Vendedor</label>
                                <select id="vendedor" name="vendedor" class="form-select">
                                    <option value="">Selecione um Vendedor</option>
                                </select>
                            </div>

                            <hr>

                            <div class="mb-3">
                                <label for="produto" class="form-label">Produto</label>
                                <select id="produto" name="produto" class="form-select">
                                    <option value="">Selecione um Produto</option>
                                        <?php
                                            $stmt = $conn->prepare(
                                            "SELECT p.id, p.nome_produto, p.quantidade, p.preco, p.imagem
                                            FROM produtos p
                                            INNER JOIN topicos t ON p.topico_id = t.id_topico
                                            WHERE t.usuario_id = ?");
                                            $stmt->bind_param("i", $usuario_id);
                                            $stmt->execute();
                                            $result = $stmt->get_result();
                                            while ($produto = $result->fetch_assoc()) {
                                                echo "<option value='{$produto['id']}' 
                                                            data-quantidade='{$produto['quantidade']}'
                                                            data-preco=' {$produto['preco']}'
                                                            data-foto='../../../uploads/{$produto['imagem']}'>
                                                            {$produto['nome_produto']}
                                                    </option>";
                                            }
                                        ?>
                                </select>
                            </div>

                            <div id="detalhesProduto" style="display:none;">
                                <img id="previewProduto" src="" alt="Imagem do Produto" class="img-thumbnail mb-2" style="max-width:120px;">
                                <p><strong>Preço:</strong> R$ <span id="precoProduto"></span></p>
                                <label>Quantidade</label>
                                <input type="number" id="quantidade" class="form-control" min="1" value="1">
                                <button type="button" class="btn btn-success mt-2" id="adicionarCarrinho">
                                    Adicionar ao Carrinho
                                </button>
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
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="carrinhoLista">
                                <!-- Produtos inseridos via JS -->
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-between mt-3">
                            <h5>Total:</h5>
                            <h5 id="totalVenda">R$ 0,00</h5>
                        </div>
                        <button class="btn btn-primary w-100 mt-3">Finalizar Venda</button>
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

                document.getElementById('detalhesProduto').style.display = 'block';
                document.getElementById('precoProduto').innerText = preco;
                document.getElementById('previewProduto').src = foto;
                document.getElementById('quantidade').max = qtd; // limite até o estoque disponível
            } else {
                document.getElementById('detalhesProduto').style.display = 'none';
            }
        });
</script>
</body>
</html>
