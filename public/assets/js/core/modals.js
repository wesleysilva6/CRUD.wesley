        // MODAL PARA REMOVER TÓPICO
            const removerTopico = document.getElementById('removerTopico')
            if (removerTopico) {
                removerTopico.addEventListener('show.bs.modal', function (event) {
                    const button = event.relatedTarget
                    const idTopico = button.getAttribute('data-id-topico')
                    const confirmarBtn = document.getElementById('deletarTopico')
                    if (confirmarBtn) {
                        confirmarBtn.href = `../controllers/topicos/excluir_topico.php?id_topico=${idTopico}`
                    }
                })
            }

        // MODAL PARA REMOVER PRODUTO
            const removerProduto = document.getElementById('removerProduto')
            if(removerProduto) {
                removerProduto.addEventListener('show.bs.modal', function (event) {
                    const button = event.relatedTarget
                    const idProduto = button.getAttribute('data-id-produto')
                    const confirmarBtn = document.getElementById('deletarProduto')
                    if (confirmarBtn) {
                        confirmarBtn.href = `../controllers/produtos/excluir_produto.php?id_produto=${idProduto}`
                    }
                })
            }

        // MODAL PARA REMOVER SIMULAÇÃO
            const removerSimulacao = document.getElementById('removerSimulacao')
            if(removerSimulacao) {
                removerSimulacao.addEventListener('show.bs.modal', function (event) {
                    const button = event.relatedTarget
                    const idItem = button.getAttribute('data-id-item')
                    const confirmarBtn = document.getElementById('deletarSimulacao')
                    if (confirmarBtn) {
                        confirmarBtn.href = `../controllers/historico/deletar_simulacao.php?id_item=${idItem}`
                    }
                })
            }

        // MODAL PARA REMOVER SIMULAÇÃO
            const limparHistorico = document.getElementById('limparHistorico')
            if(limparHistorico) {
                limparHistorico.addEventListener('show.bs.modal', function (event) {
                    const confirmarBtn = document.getElementById('deletarHistorico')
                    if (confirmarBtn) {
                        confirmarBtn.href = `../controllers/historico/deletar_simulacoes.php`
                    }
                })
            }
