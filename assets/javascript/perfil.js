    function mostrarPreview(input) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('preview').src = e.target.result;
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

        const senhaAtual = document.getElementById('senhaAtual');
        const toggleSenha = document.getElementById('toggleSenha');
        const icon = toggleSenha.querySelector('i');

        toggleSenha.addEventListener('click', () => {
            if (senhaAtual.type === 'password') {
                senhaAtual.type = 'text';
                icon.classList.remove('bi-eye');
                icon.classList.add('bi-eye-slash');
            } else {
                senhaAtual.type = 'password';
                icon.classList.remove('bi-eye-slash');
                icon.classList.add('bi-eye');
            }
        });

        const novaSenha = document.getElementById('novaSenha');
        const toggleSenha2 = document.getElementById('toggleSenha2');
        const icon2 = toggleSenha2.querySelector('i');

        toggleSenha2.addEventListener('click', () => {
            if (novaSenha.type === 'password') {
                novaSenha.type = 'text';
                icon2.classList.remove('bi-eye');
                icon2.classList.add('bi-eye-slash');
            } else {
                novaSenha.type = 'password';
                icon2.classList.remove('bi-eye-slash');
                icon2.classList.add('bi-eye');
            }
        });

        const confirmarSenha = document.getElementById('confirmarSenha');
        const toggleSenha3 = document.getElementById('toggleSenha3');
        const icon3 = toggleSenha3.querySelector('i');

        toggleSenha3.addEventListener('click', () => {
            if (confirmarSenha.type === 'password') {
                confirmarSenha.type = 'text';
                icon3.classList.remove('bi-eye');
                icon3.classList.add('bi-eye-slash');
            } else {
                confirmarSenha.type = 'password';
                icon3.classList.remove('bi-eye-slash');
                icon3.classList.add('bi-eye');
            }
        });