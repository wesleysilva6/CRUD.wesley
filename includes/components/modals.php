<!DOCTYPE html>
<head>
    <link rel="shortcut icon" href="../assets/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../assets/css/home.css">
</head>

    <body>
        <!-- MODAL de ADICIONAR TÓPICO -->
        <div class="modal fade" id="modalTopico" tabindex="-1">
            <div class="modal-dialog">
                <form action="../modules/topicos/add_topico.php" method="POST" class="modal-content">
                    <div class="modal-header text-white">
                        <h5 class="modal-tittle text-white">Adicionar Tópico :</h5>
                        <button type="button" class="btn-close-white btn-close" data-bs-dismiss="modal"></button>
                    </div>
                        <div class="modal-body text-white">
                            <div class="mb-3">
                                <label class="form-label">Nome do Tópico :</label>
                                <input type="text" class="form-control" name="nome_topico" placeholder="Nome do Tópico" required>
                            </div>
                                <button type="submit" class="btn btn-primary w-100">Adicionar Tópico</button>
                        </div>
                </form>
            </div>
        </div>

        <!-- MODAL de ADICIONAR PRODUTO -->
        <div class="modal fade" id="modalProduto" tabindex="-1">
            <div class="modal-dialog">
                <form action="../modules/produtos/adicionar_produto.php" method="POST" class="modal-content" enctype="multipart/form-data">
                    <input type="hidden" name="id_topico">
                        <div class="modal-header text-white">
                            <h5 class="modal-tittle text-white">Adicionar Produto</h5>
                            <button type="button" class="btn-close-white btn-close" data-bs-dismiss="modal"></button>
                        </div>
                            <div class="modal-body text-white">
                                    <div class="mb-3">
                                        <label class="form-label">Imagem do Produto:</label>
                                        <input type="file" class="form-control" name="imagem" id="inputImagem" accept="image/*">
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

            <!-- MODAL de PREVIEW da IMAGEM -->
            <div class="modal fade" id="modalImagem" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content bg-dark">
                    <div class="modal-header border-0">
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fechar"></button>
                    </div>
                    <div class="modal-body text-center">
                        <img id="imagemModal" src="" alt="Imagem do produto" style="max-width: 100%; border-radius: 20px;">
                    </div>
                    </div>
                </div>
            </div>

                <!-- MODAL de EDITAR PRODUTO -->
                <div class="modal fade" id="editarModal" tabindex="-1">
                <div class="modal-dialog">
                    <form action="../modules/produtos/editar_produto.php" method="POST" class="modal-content" enctype="multipart/form-data">
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

        <!-- MODAL de EXCLUIR TÓPICO -->
        <div class="modal fade" id="removerTopico" tabindex="-1" aria-labelledby="removerTopicoLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                
                <div class="modal-content">
                    <div class="modal-header text-white">
                    <h5 class="modal-title">Excluir Tópico</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>

                <div class="modal-body text-white">
                    <p><strong>Tem certeza de que deseja excluir este tópico? Ao prosseguir, todos os produtos vinculados a ele também serão permanentemente removidos.</strong></p>
                </div>

                <div class="modal-footer">
                    <a id="confirmarExclusao" href="#" class="btn btn-primary">Sim</a>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Não</button>
                </div>

                </div>
            </div>
        </div>

        <!-- MODAL DE EXCLUIR PRODUTO -->
        <div class="modal fade" id="removerProduto" tabindex="-1" aria-labelledby="removerProdutoLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header text-white">
                        <h5 class="modal-title">Excluir Produto</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fechar"></button>
                    </div>

                    <div class="modal-body text-white">
                        <p><strong>Tem certeza de que deseja excluir este produto? Esta ação é irreversível.</strong></p>
                    </div>

                    <div class="modal-footer">
                        <a id="deletarProduto" href="#" class="btn btn-primary">Sim</a>
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Não</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- MODAL DE EXCLUIR SIMULAÇÃO -->
        <div class="modal fade" id="removerSimulacao" tabindex="-1" aria-labelledby="removerProdutoLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header text-white">
                        <h5 class="modal-title">Excluir Simulação</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fechar"></button>
                    </div>

                    <div class="modal-body text-white">
                        <p><strong>Tem certeza de que deseja excluir esta Simulação? Esta ação é irreversível.</strong></p>
                    </div>

                    <div class="modal-footer">
                        <a id="deletarSimulacao" href="" class="btn btn-primary">Sim</a>
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Não</button>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>