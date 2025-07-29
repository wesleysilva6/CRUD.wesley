    function mostrarPreview(input) {
        if (input.files && input.files[0]) {
            const reader = new FileReader()
            reader.onload = function(e) {
                document.getElementById('preview').src = e.target.result;
            }
            reader.readAsDataURL(input.files[0])
            }
        }

        // Cropper.js para cortar imagem de perfil
        let cropper
        const inputFoto = document.getElementById('inputFoto')
        const imagemCrop = document.getElementById('imagemCrop')
        const btnCortar = document.getElementById('btnCortar')
        const form = document.getElementById('formFoto')

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