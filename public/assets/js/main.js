        const inputImagem = document.getElementById('inputImagem');
        const previewImagem = document.getElementById('previewImagem');

        if (previewImagem && inputImagem) {
        inputImagem.addEventListener('change', function () {
            const arquivo = this.files[0];
            if (arquivo) {
            const leitor = new FileReader();
            leitor.onload = function (e) {
                previewImagem.setAttribute('src', e.target.result);
                previewImagem.style.display = 'block';
            };
            leitor.readAsDataURL(arquivo);
        } else {
            previewImagem.style.display = 'none';
        }
        });
    }

        function preencherModalEditar(botao) {
        document.getElementById('editar_id_produto').value = botao.dataset.id;
        document.getElementById('editar_id_topico').value = botao.dataset.idTopico;
        document.getElementById('editar_nome_produto').value = botao.dataset.produto;
        document.getElementById('editar_preco').value = botao.dataset.preco;
        document.getElementById('editar_quantidade').value = botao.dataset.quantidade;
        document.getElementById('editar_descricao').value = botao.dataset.desc;
        }

        function mostrarImagem(src) {
        const img = document.getElementById('imagemModal');
        img.src = src;
        }

        function setIdTopico(id) {
        document.querySelector('input[name="id_topico"]').value = id;
        }

        // MODAL PARA REMOVER TÓPICO
        document.addEventListener('DOMContentLoaded', function() {
            const removerTopico = document.getElementById('removerTopico')
            if (removerTopico) {
                removerTopico.addEventListener('show.bs.modal', function (event) {
                    const button = event.relatedTarget;
                    const idTopico = button.getAttribute('data-id-topico')
                    const confirmarBtn = document.getElementById('deletarTopico')
                    if (confirmarBtn) {
                        confirmarBtn.href = `../controllers/topicos/excluir_topico.php?id_topico=${idTopico}`
                    }
                })
            }
        })

        // MODAL PARA REMOVER PRODUTO
        document.addEventListener('DOMContentLoaded', function() {
            const removerProduto = document.getElementById('removerProduto');
            if(removerProduto) {
                removerProduto.addEventListener('show.bs.modal', function (event) {
                    const button = event.relatedTarget;
                    const deletar = button.getAttribute('data-id-produto')
                    const confirmarBtn = document.getElementById('deletarProduto')
                    if (confirmarBtn) {
                        confirmarBtn.href = `../controllers/produtos/excluir_produto.php?id_produto=${deletar}`
                    }
                })
            }
        })

        // MODAL PARA REMOVER SIMULAÇÃO
        document.addEventListener('DOMContentLoaded', function() {
            const removerSimulacao = document.getElementById('removerSimulacao');
            if(removerSimulacao) {
                removerSimulacao.addEventListener('show.bs.modal', function (event) {
                    const button = event.relatedTarget;
                    const idItem = button.getAttribute('data-id-item')
                    const confirmarBtn = document.getElementById('deletarSimulacao')
                    if (confirmarBtn) {
                        confirmarBtn.href = `../controllers/historico/deletar_simulacao.php?id_item=${idItem}`
                    }
                })
            }
        })
