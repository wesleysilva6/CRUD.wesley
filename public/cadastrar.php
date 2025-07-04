<?php
    session_start();
    include '../includes/core/conexao.php';
    include '../includes/components/header.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'] ?? '';
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';
    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senhaHash')";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['nome'] = $nome;
        header('location: login.php?cadastro=realizado');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../assets/img/favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../assets/css/cadastro.css">
    <title>Estoque Aqui - System</title>
</head>
    <body style="background:#000">
        <div class="container"> 
            <div class="row">
                <div class="card-login">
                        <div class="card">
                            <div class="card-header" style="color:#fff">Cadastrar</div>
                                <div class="text-center"><img src="../assets/img/fundop.png" alt="" width="200rem" height="200rem"></div>
                                
                            <div class="card-body">
                                <form action="cadastrar.php" method="POST">

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
                                        <input type="password" class="form-control" name="senha" id="senhaInput" placeholder="Senha" required>
                                        <button type="button" class="eyes btn btn-dark" id="toggleSenha">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                    </div>

                                    
                                    <button class="btn btn-sm btn-primary mt-2 w-100" type="submit">Cadastrar</button>
                                    <div class="text-end mt-2"><a href="../public/login.php">Já possui login?</a></div>
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
                    const senhaInput = document.getElementById('senhaInput');
                    const toggleSenha = document.getElementById('toggleSenha');
                    const icon = toggleSenha.querySelector('i');

                    toggleSenha.addEventListener('click', () => {
                        if (senhaInput.type === 'password') {
                            senhaInput.type = 'text';
                            icon.classList.remove('bi-eye');
                            icon.classList.add('bi-eye-slash');
                        } else {
                            senhaInput.type = 'password';
                            icon.classList.remove('bi-eye-slash');
                            icon.classList.add('bi-eye');
                        }
                    });
                </script>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    </body>
</html>