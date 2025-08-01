        document.addEventListener('DOMContentLoaded', function () {
        const forms = document.getElementsByClassName('spinnerForm')
        const spinners = document.getElementsByClassName('checkSpinner')
        const btns = document.getElementsByClassName('btnEnviar')

        if (forms && spinners && btns) {
            Array.from(forms).forEach((form, index) => {
                form.addEventListener('submit', function () {
                    btns[index].disabled = true
                    spinners[index].style.display = 'inline-block'
                })
            })
        }
    });

