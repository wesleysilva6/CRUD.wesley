        const inputImagem = document.getElementById('inputImagem');
        const previewImagem = document.getElementById('previewImagem');

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

        function mostrarImagem(src) {
        const img = document.getElementById('imagemModal');
        img.src = src;
        }

        function setIdTopico(id) {
        document.querySelector('input[name="id_topico"]').value = id;
        }

        function removerTopico() {
        return confirm('Você ira fazer a exclusão desse Tópico juntamente com seus produtos, não será possível recuperar os dados após a exclusão.')
        }

        function preencherModalEditar(botao) {
        document.getElementById('editar_id_produto').value = botao.dataset.id;
        document.getElementById('editar_id_topico').value = botao.dataset.idTopico;
        document.getElementById('editar_nome_produto').value = botao.dataset.produto;
        document.getElementById('editar_preco').value = botao.dataset.preco;
        document.getElementById('editar_quantidade').value = botao.dataset.quantidade;
        document.getElementById('editar_descricao').value = botao.dataset.desc;
        }