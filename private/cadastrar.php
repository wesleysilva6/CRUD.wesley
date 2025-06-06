<?php
    include '../includes/conexao.php';
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'] ?? '';
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';
    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senhaHash')";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['nome'] = $nome;
        header('location: cadastrado.php');
        exit();
    } else {
        echo "Erro: " . $conn->error;
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
    <title>Estoque Aqui - System</title>

    <style>
        ::-webkit-scrollbar {
        width: 8px;
        }

        ::-webkit-scrollbar-thumb {
        background:  #0B5ED7;
        }

        .card-login {
        padding: 13rem 0 0 0;
        width: 28rem;
        margin: 0 auto;
    }

        .card {
        background-color: #0C0F16;
    }

        .input-group-text {
        background-color: #20252A;
        border: 1px solid #393E42;
        }

        .form-control {
        color: #fff;
        background-color: #20252A;
        border: 1px solid #393E42;
        }

        .form-control::placeholder {
        color:rgba(255, 255, 255, 0.76); 
    }

        input:focus, .form-control:focus {
        box-shadow: none;
        outline: none;
        background-color: #20252A;
        color:#fff;
        border-color: #393E42;
    }

        .navbar {
        background-color: #0C0F16;
    }

        footer {
        background: #0C0F16;
        padding: 1rem 4%;
        margin: 14.19rem 0 0 0;
    }
    </style>


</head>
    <body style="background:#000">

        <nav class="navbar" data-bs-theme="dark">
            <div class="container-fluid">
                <a href="../public/index.php" class="navbar-brand">
                <img src="../assets/img/logo_stexto.png" width="65" height="65" alt=""> <img src="../assets/img/fundop2.png" alt="" width="85" height="65">
                </a>
                <ul class="navbar-nav">
                    <li class="nav-item"><a href="../includes/deslogar.php" class="nav-link">Voltar</a></li>
                </ul>
            </div>
        </nav>

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
                                        <input type="password" class="form-control" name="senha" id="" placeholder="Senha" required>
                                    </div>
                                    
                                    <button class="btn btn-sm btn-primary mt-2 w-100" type="submit">Cadastrar</button>
                                    <div class="text-end mt-2"><a href="../private/login.php">Já possui login?</a></div>
                                </form>
                            </div>
                        </div>
                </div>
            </div>
        </div>

            <footer>
                <div class="text-center"><img src="../assets/img/fundop.png" alt="" width="200rem" height="200rem"></div>
            </footer>


            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    </body>
</html>