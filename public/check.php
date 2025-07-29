<?php 
    session_start();
    include '../includes/core/conexao.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/check.css">
    <script src="assets/js/main.js" defer></script>
    <title>Estoque Aqui - System</title>
</head>
    <body>
    <?php include '../includes/components/header.php' ?>
        <div class="container"> 
            <div class="row">
                <div class="card-login">
                    <div class="card">

                        <div class="card-header" style="color:#fff">Verificar e-mail</div>
                        <div class="text-center"><img src="assets/img/fundop.png" alt="" width="200rem" height="200rem"></div>
                            <div class="card-body">
                                <form action="../includes/core/check_email.php" method="POST" id="spinnerForm">

                                    <div class="input-group mt-1">
                                        <span class="input-group-text"><i class="bi bi-envelope" style="color:#fff"></i></span>
                                        <input type="email" class="form-control" name="email_redefinir" placeholder="E-mail">
                                    </div>

                                    <?php if (isset($_GET['erro']) && $_GET['erro'] == 'email') { ?>
                                        <div class="text-danger">E-mail inválido. Verifique e tente novamente.</div>
                                    <?php } ?>

                                    <button class="btn btn-sm btn-primary mt-2 w-100" type="submit" id="btnEnviar">Enviar E-mail</button>
                                    <div class="d-flex justify-content-center mt-2">
                                        <div id="checkSpinner" class="spinner-border text-primary" role="status" style="display:none;">
                                            <span class="visually-hidden">Carregando...</span>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>  
                </div>
            </div>
        </div>

            <!-- MODAL de EMAIL ENVIADO -->
            <div class="modal fade" id="emailModal" tabindex="-1" aria-labelledby="emailModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <div class="modal-header text-white">
                    <h5 class="modal-title" id="emailModalLabel">E-mail enviado com sucesso!</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>
                <div class="modal-body text-white">
                    <p>E-mail de redefinição de senha enviado para: <strong id="usuarioEmail"></strong></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
                </div>
                </div>
            </div>
            </div>

        <?php 
            include '../includes/components/footer.php';
            if (isset($_GET['email']) && $_GET['email'] == 'enviado' && isset($_SESSION['email_redefinir'])) {
                $usuario = htmlspecialchars($_SESSION['email_redefinir']); ?>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const usuario = "<?php echo $usuario; ?>";
                    document.getElementById('usuarioEmail').innerText = usuario;
                    const emailModal = new bootstrap.Modal(document.getElementById('emailModal'));
                    emailModal.show();
                });
            </script>
        <?php } ?>

        <script>
            setTimeout(() => {
                document.querySelectorAll('.text-danger').forEach(al => {
                    al.style.display = 'none'
                })
                history.replaceState(null, '', 'http://localhost:3000/public/check.php')
            }, 3000);
        </script>
            <script src="assets/js/perfil.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    </body>
</html>