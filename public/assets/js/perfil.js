    function mostrarPreview(input) {
        if (input.files && input.files[0]) {
            const reader = new FileReader()
            reader.onload = function(e) {
                document.getElementById('preview').src = e.target.result;
            }
            reader.readAsDataURL(input.files[0])
            }
        }

        const senhaAtual = document.getElementById('senhaAtual')
        const toggleSenha = document.getElementById('toggleSenha')
        const icon = toggleSenha.querySelector('i')

        toggleSenha.addEventListener('click', () => {
            if (senhaAtual.type === 'password') {
                senhaAtual.type = 'text';
                icon.classList.remove('bi-eye')
                icon.classList.add('bi-eye-slash')
            } else {
                senhaAtual.type = 'password'
                icon.classList.remove('bi-eye-slash')
                icon.classList.add('bi-eye')
            }
        });

        const novaSenha = document.getElementById('novaSenha')
        const toggleSenha2 = document.getElementById('toggleSenha2')
        const icon2 = toggleSenha2.querySelector('i')

        toggleSenha2.addEventListener('click', () => {
            if (novaSenha.type === 'password') {
                novaSenha.type = 'text'
                icon2.classList.remove('bi-eye')
                icon2.classList.add('bi-eye-slash')
            } else {
                novaSenha.type = 'password';
                icon2.classList.remove('bi-eye-slash')
                icon2.classList.add('bi-eye')
            }
        });

        const confirmarSenha = document.getElementById('confirmarSenha')
        const toggleSenha3 = document.getElementById('toggleSenha3')
        const icon3 = toggleSenha3.querySelector('i')

        toggleSenha3.addEventListener('click', () => {
            if (confirmarSenha.type === 'password') {
                confirmarSenha.type = 'text'
                icon3.classList.remove('bi-eye')
                icon3.classList.add('bi-eye-slash')
            } else {
                confirmarSenha.type = 'password'
                icon3.classList.remove('bi-eye-slash')
                icon3.classList.add('bi-eye')
            }
        });

        // Cropper.js para cortar imagem de perfil
        let cropper
        const inputFoto = document.getElementById('inputFoto')
        const imagemCrop = document.getElementById('imagemCrop')
        const btnCortar = document.getElementById('btnCortar')
        //const form = document.getElementById('formFoto')

        inputFoto.addEventListener('change', function (e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader()

                reader.onload = function (event) {
                    imagemCrop.src = event.target.result;
                    imagemCrop.style.display = 'block'

                    if (cropper) {
                        cropper.destroy()
                    }

                    cropper = new Cropper(imagemCrop, {
                        aspectRatio: 1,
                        viewMode: 1
                    });

                    btnCortar.style.display = 'inline-block'
                };

                reader.readAsDataURL(file)
            }
        });

        btnCortar.addEventListener('click', function () {
            const canvas = cropper.getCroppedCanvas({
                width: 300,
                height: 300
            });

            canvas.toBlob(function (blob) {
                const formData = new FormData();
                formData.append('foto', blob, 'cortada.png')

                fetch('../controllers/perfil/atualizar_foto.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => {
                    if (response.redirected) {
                        window.location.href = response.url;
                    } else {
                        alert('Erro ao enviar imagem.')
                    }
                })
            }, 'image/png')
        })