    <?php require_once __DIR__ . '/../includes/core/bootstrap.php'; ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="assets/css/cadastro.css">
    <script src="assets/js/core/main.js" defer></script>
    <script src="assets/js/core/password-toggle.js" defer></script>
    <title>Estoque Aqui - System</title>
</head>
    <body>
        <nav class="navbar" data-bs-theme="dark">
            <div class="container-fluid">
                <a href="cadastrar.php" class="navbar-brand">
                <img src="assets/img/logo_stexto.png" width="65" height="65" alt=""> <img src="assets/img/fundop2.png" alt="" width="85" height="65">
                </a>
                <ul class="navbar-nav"> 
                    <li class="nav-item"><a href="../includes/core/deslogar.php" class="nav-link">Voltar</a></li>
                </ul>
            </div>
        </nav>

        <div class="container">
            <div class="row">
                <div class="card-login">
                        <div class="card">
                            <div class="card-header" style="color:#fff">Redefinir Senha</div>
                                <div class="text-center"><img src="assets/img/fundop.png" alt="" width="200rem" height="200rem"></div>

                            <div class="card-body">
                                <form action="../includes/core/redefinir_senha.php" method="POST" class="spinnerForm">

                                    <div class="input-group mt-2">
                                        <span class="input-group-text"><i class="bi bi-lock" style="color:#fff"></i></span>
                                        <input type="password" class="form-control" name="senha" id="senhaAtual" placeholder="Digite uma Senha" required>
                                        <button type="button" class="eyes btn btn-dark" data-toggle="password" data-target="senhaAtual">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                    </div>

                                    <div class="input-group mt-2">
                                        <span class="input-group-text"><i class="bi bi-lock" style="color:#fff"></i></span>
                                        <input type="password" class="form-control" name="confirmar_senha" id="novaSenha" placeholder="Confirme a Senha" required>
                                        <button type="button" class="eyes btn btn-dark" data-toggle="password" data-target="novaSenha">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                    </div>

                                <?php 
                                    $mensagem = [
                                        'error' => [
                                            'reencher_campos' => ['danger', 'Por favor, preencha todos os campos obrigatórios']
                                        ],
                                        'erro' => [
                                            'senhas_diferentes' => ['danger', 'As senhas informadas não coincidem. Por favor, verifique e tente novamente.']
                                        ]
                                    ];

                                    foreach ($mensagem as $param => $opcoes) {
                                        if(isset($_GET[$param]) && isset($opcoes[$_GET[$param]])) {
                                            [$tipo, $mensagem] = $opcoes[$_GET[$param]];
                                            echo "<div class='text-$tipo'>$mensagem</div>";
                                        }
                                    }
                                ?>

                                    <button class="btnEnviar btn btn-sm btn-primary mt-2 w-100" type="submit">Redefinir Senha</button>
                                    <div class="d-flex justify-content-center mt-2">
                                        <div class="checkSpinner spinner-border text-primary" role="status" style="display:none;">
                                            <span class="visually-hidden">Carregando...</span>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                </div>
            </div>
        </div>

                <?php 
                    view('footer')
                ?>

            <script src="assets/js/perfil.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    </body>
</html>
