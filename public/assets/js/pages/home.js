        function mostrarImagem(src) {
        const img = document.getElementById('imagemModal')
        img.src = src
        }

        const inputImagem = document.getElementById('inputImagem')
        const previewImagem = document.getElementById('previewImagem')

        if (previewImagem && inputImagem) {
        inputImagem.addEventListener('change', function () {
            const arquivo = this.files[0]
            if (arquivo) {
            const leitor = new FileReader()
            leitor.onload = function (e) {
                previewImagem.setAttribute('src', e.target.result)
                previewImagem.style.display = 'block'
            };
            leitor.readAsDataURL(arquivo)
        } else {
            previewImagem.style.display = 'none'
        }
        })
    }

        function preencherModalEditar(botao) {
        document.getElementById('editar_id_produto').value = botao.dataset.id
        document.getElementById('editar_id_topico').value = botao.dataset.idTopico
        document.getElementById('editar_nome_produto').value = botao.dataset.produto
        document.getElementById('editar_preco').value = botao.dataset.preco
        document.getElementById('editar_quantidade').value = botao.dataset.quantidade
        document.getElementById('editar_descricao').value = botao.dataset.desc
        }

        function setIdTopico(id) {
        document.querySelector('input[name="id_topico"]').value = id
        }