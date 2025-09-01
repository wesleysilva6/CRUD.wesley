<?php
    session_start();
    require_once __DIR__ . '/../includes/core/bootstrap.php';

    require_once '../includes/core/conexao.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = $_POST['nome'] ?? '';
        $email = $_POST['email'] ?? '';
        $senha = $_POST['senha'] ?? '';

        if (empty($nome) || empty($email) || empty($senha)) {
            header('location: cadastrar.php?erro=cadastro');
            exit;
        }

        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)");
        $stmt->bind_param('sss', $nome, $email, $senhaHash);

        if ($stmt->execute()) {
            $_SESSION['nome'] = $nome;
            header('Location: login.php?cadastro=realizado');
            exit;
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="assets/css/cadastro.css">
    <script src="assets/js/core/password-toggle.js" defer></script>
    <script src="assets/js/core/main.js" defer></script>
    <title>Estoque Aqui - System</title>
</head>
    <body>
    <?php view('header') ?>
        <div class="container"> 
            <div class="row"> 
                <div class="card-login">
                        <div class="card">
                            <div class="card-header" style="color:#fff">Cadastrar</div>
                                <div class="text-center"><img src="assets/img/fundop.png" alt="" width="200rem" height="200rem"></div>

                            <div class="card-body">
                                <form action="cadastrar.php" method="POST" class="spinnerForm">
                                    <div class="input-group mt-1">
                                        <span class="input-group-text"><i class="bi bi-person-circle" style="color:#fff"></i></span>
                                        <input type="text" class="form-control" name="nome" placeholder="Usuário" required>
                                    </div>

                                    <div class="input-group mt-2">
                                        <span class="input-group-text"><i class="bi bi-envelope" style="color:#fff"></i></span>
                                        <input type="email" class="form-control" name="email" id="" placeholder="E-mail" required>
                                    </div>

                                    <div class="input-group mt-2">
                                        <span class="input-group-text"><i class="bi bi-lock" style="color:#fff"></i></span>
                                        <input type="password" class="form-control" name="senha" id="senhaAtual" placeholder="Senha" required>
                                        <button type="button" class="eyes btn btn-dark" data-toggle="password" data-target="senhaAtual">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                    </div>

                                    <?php if(isset($_GET['erro']) && $_GET['erro'] == 'cadastro') { ?>
                                        <div class="text-danger">Preencha todos os campos</div>
                                    <?php } ?>

                                    <button class="btnEnviar btn btn-sm btn-primary mt-2 w-100" type="submit">Cadastrar</button>
                                    <div class="d-flex justify-content-center mt-2">
                                        <div class="checkSpinner spinner-border text-primary" role="status" style="display:none;">
                                            <span class="visually-hidden">Carregando...</span>
                                        </div>
                                    </div>

                                    <div class="text-end mt-"><a href="../public/login.php">Já possui login?</a></div>
                                </form>
                            </div>
                        </div>
                </div>
            </div>
        </div>

                <?php 
                    view('footer')
                ?>

        <script>
            setTimeout(() => {
                document.querySelectorAll('.text-danger').forEach(al => {
                    al.style.display = 'none'
                })
                history.replaceState(null, '', 'http://localhost:3000/public/cadastrar.php')
            }, 3000);
        </script>
            <script src="assets/js/perfil.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    </body>
</html>