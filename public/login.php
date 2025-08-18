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
    <link rel="stylesheet" href="assets/css/login.css">
    <script src="assets/js/core/main.js" defer></script>
    <script src="assets/js/core/password-toggle.js" defer></script>
    <title>Estoque Aqui - System</title>
</head>
    <body>
    <?php include '../includes/components/header.php' ?>
        <div class="container"> 
            <div class="row">
                <div class="card-login">
                    <div class="m-auto text-center">
                        <?php if (isset($_GET['sucesso']) == 'senha') { ?>
                            <div class="alert alert-success">Senha alterada com sucesso.</div>
                        <?php } ?>
                    </div>
                    <div class="card">
                        <div class="card-header" style="color:#fff">Entrar</div>
                        <div class="text-center"><img src="assets/img/fundop.png" alt="" width="200rem" height="200rem"></div>
                            <div class="card-body">
                                <form action="../includes/core/valida_acesso.php" method="POST" class="spinnerForm">

                                    <div class="input-group mt-1">
                                        <span class="input-group-text"><i class="bi bi-envelope" style="color:#fff"></i></span>
                                        <input type="email" class="form-control" name="email" placeholder="E-mail" required>
                                    </div>

                                    <div class="input-group mt-2">
                                        <span class="input-group-text"><i class="bi bi-lock" style="color:#fff"></i></span>
                                        <input type="password" class="form-control" name="senha" id="senhaAtual" placeholder="Senha" required>
                                        <button type="button" class="eyes btn btn-dark" data-toggle="password" data-target="senhaAtual">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                    </div>

                                <?php 
                                    $mensagem = [
                                        'error' => [
                                            'email_senha' => ['danger', 'Email e senha inválidos']
                                        ],
                                        'erro' => [
                                            'senha' => ['danger', 'Senha inválida']
                                        ]
                                    ];

                                    foreach ($mensagem as $param => $opcoes) {
                                        if(isset($_GET[$param]) && isset($opcoes[$_GET[$param]])) {
                                            [$tipo, $mensagem] = $opcoes[$_GET[$param]];
                                            echo "<div class='text-$tipo'>$mensagem</div>";
                                        }
                                    }
                                ?>

                                    <button class="btnEnviar btn btn-sm btn-primary mt-2 w-100" type="submit">Entrar</button>
                                    <div class="d-flex justify-content-center mt-2">
                                        <div class="checkSpinner spinner-border text-primary" role="status" style="display:none;">
                                            <span class="visually-hidden">Carregando...</span>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-between">
                                        <a href="check.php">Esqueceu a Senha?</a>
                                        <a href="cadastrar.php">Cadastrar-se</a>
                                    </div>
                                </form>
                            </div>
                        </div>  
                </div>
            </div>
        </div>

            <?php 
                include '../includes/components/footer.php'
            ?>

    <script>
        setTimeout(() => {
            document.querySelectorAll('.text-danger, .alert').forEach(al => {
                al.style.display = 'none'
            })
            history.replaceState(null, '', 'http://localhost:3000/public/login.php')
        }, 3000);
    </script>
            <script src="assets/js/perfil.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    </body>
</html>