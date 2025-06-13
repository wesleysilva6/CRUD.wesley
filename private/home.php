<?php
    session_start();
    include '../includes/conexao.php';
    date_default_timezone_set('America/Sao_Paulo');

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
    <link rel="stylesheet" href="../assets/css/home.css">
    <script src="../assets/javascript/index.js"></script>

    <title>Estoque Aqui - Dashboard</title>

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
                                        <label class="form-label">Imagem do Produto:</label>
                                        <input type="file" class="form-control" name="imagem" id="inputImagem" accept="image/*" required>
                                        <img id="previewImagem" src="#" alt="Preview da Imagem" style="display:none; margin-top: 10px; max-width: 100%; border-radius: 8px;" />
                                    </div>

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
                $usuario_id = $_SESSION['id'];
                $stmt = $conn->prepare("SELECT id_topico, nome_topico FROM topicos WHERE usuario_id = ?");
                $stmt->bind_param("i", $usuario_id);
                $stmt->execute();
                $result = $stmt->get_result();

                    while ($topico = $result->fetch_assoc()) {
                        $produtos = $conn->query("SELECT * FROM produtos WHERE topico_id = " . intval($topico['id_topico']));
                    ?>

    <div class="container pb-5 mt-3" style="background: #161A1F">
            <h4 class="my-3" style="color:#fff"> <?php echo htmlspecialchars($topico['nome_topico']); ?> </h4>
            <div class="card-body">
            <table class="table table-striped mb-0">
                <thead>
                    <tr>
                        <th>Imagem do Produto</th>
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
                            <td>
                            <?php if (!empty($produto['imagem'])): ?>
                                <img src="<?php echo $produto['imagem']; ?>"
                                    width="60"
                                    height="60"
                                    style="object-fit:cover; border-radius:8px; cursor: pointer;"
                                    data-bs-toggle="modal"
                                    data-bs-target="#modalImagem"
                                    onclick="mostrarImagem('<?php echo $produto['imagem']; ?>')"
                                >
                            <?php else: ?>
                                <span class="text-muted">Sem imagem</span>
                            <?php endif; ?>
                            </td>
                            <td> <?php echo ($produto['nome_produto']); ?> </td>
                            <td> <?php echo 'R$ '. number_format($produto['preco'], 2, '.'); ?> </td>
                            <td> <?php echo $produto['quantidade']; ?> </td>
                            <td> <?php echo ($produto['descricao']); ?> </td>
                            <td> <?php echo $produto['atualizado_em']; ?> </td>

                                <td> <button class="btn"
                                data-id="<?php echo $produto['id']; ?>"
                                data-id-topico="<?php echo $topico['id_topico']; ?>"
                                data-produto="<?php echo htmlspecialchars($produto['nome_produto']); ?>"
                                data-preco="<?php echo $produto['preco']; ?>"
                                data-quantidade="<?php echo $produto['quantidade']; ?>"
                                data-desc="<?php echo htmlspecialchars($produto['descricao']); ?>"
                                data-bs-toggle="modal"
                                data-bs-target="#editarModal"
                                onclick="preencherModalEditar(this)">
                                <span class="icon"><i class="bi bi-pencil-square"></i></span>
                            </button></td>
                            
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

                    <!-- Modal de Preview da Imagem -->
                <div class="modal fade" id="modalImagem" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content bg-dark">
                    <div class="modal-header border-0">
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fechar"></button>
                    </div>
                    <div class="modal-body text-center">
                        <img id="imagemModal" src="#" alt="Imagem do produto" style="max-width: 100%; border-radius: 10px;">
                    </div>
                    </div>
                </div>
                </div>
<?php } ?>

                <div class="modal fade" id="editarModal" tabindex="-1">
                <div class="modal-dialog">
                    
                    <form action="../src/editar_produto.php" method="POST" class="modal-content" enctype="multipart/form-data">
                    <div class="modal-header text-white">
                        <h5 class="modal-title text-white">Editar Produto</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body text-white">
                        <input type="hidden" name="id" id="editar_id_produto">
                        <input type="hidden" name="id_topico" id="editar_id_topico">
                        
                        <div class="mb-3">
                            <label class="form-label">Nova Imagem (opcional):</label>
                            <input type="file" class="form-control" name="imagem" accept="image/*">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nome do Produto:</label>
                            <input type="text" class="form-control" name="nome_produto" id="editar_nome_produto" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Preço:</label>
                            <input type="text" class="form-control" name="preco" id="editar_preco" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Quantidade:</label>
                            <input type="number" class="form-control" name="quantidade" id="editar_quantidade" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Descrição:</label>
                            <textarea style="resize:none;" class="form-control" name="descricao" id="editar_descricao" rows="3" required></textarea>
                        </div>


                        <button type="submit" class="btn btn-primary w-100">Atualizar Produto</button>
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