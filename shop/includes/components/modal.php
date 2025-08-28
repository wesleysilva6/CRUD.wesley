<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>


            <!-- MODAL de EMAIL ENVIADO -->
            <div class="modal fade" id="vendedorModal" tabindex="-1" aria-labelledby="vendedorModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <div class="modal-header text-white">
                    <h5 class="modal-title" id="vendedorModalLabel">E-mail enviado com sucesso!</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>

                <div class="modal-body text-white text-center">
                    <p><i class="bi bi-envelope-check" style="font-size: 3.4rem;"></i><br>
                        Cadastrar Vendedor
                    </p>
                    <p>Verifique sua caixa de entrada ou spam.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
                </div>

                </div>
            </div>
            </div>
            <script>
                                document.addEventListener('DOMContentLoaded', function () {
                    const emailModal = new bootstrap.Modal(document.getElementById('vendedorModal'))
                    emailModal.show()
                })
            </script>