        document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('spinnerForm')
        const spinner = document.getElementById('checkSpinner')
        const btn = document.getElementById('btnEnviar')

        if (form && spinner && btn) {
        form.addEventListener('submit', function () {
            btn.disabled = true
            spinner.style.display = 'inline-block'
        });
        }
    });

