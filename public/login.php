<?php 
    include '../includes/components/header.php'
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../assets/img/favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/login.css">
    <title>Estoque Aqui - System</title>
</head>
    <body style="background:#000">
        <div class="container"> 
            <div class="row">
                <div class="card-login">
                    <div class="card">
                        <div class="card-header" style="color:#fff">Entrar</div>
                        <div class="text-center"><img src="../assets/img/fundop.png" alt="" width="200rem" height="200rem"></div>
                            <div class="card-body">
                                <form action="../includes/valida_acesso.php" method="POST">

                                    <div class="input-group mt-1">
                                        <span class="input-group-text"><i class="bi bi-envelope" style="color:#fff"></i></span>
                                        <input type="email" class="form-control" name="email" placeholder="E-mail">
                                    </div>

                                    <div class="input-group mt-2">
                                        <span class="input-group-text"><i class="bi bi-lock" style="color:#fff"></i></span>
                                        <input type="password" class="form-control" name="senha" placeholder="Senha">
                                    </div>

                                    <?php if(isset($_GET['erro']) && $_GET['erro'] == 'email') { ?>
                                        <div class="text-danger">Email e Senha inválidos</div>
                                    <?php } ?>

                                    <?php if(isset($_GET['erro']) && $_GET['erro'] == 'senha') { ?>
                                        <div class="text-danger">Senha inválida</div>
                                    <?php } ?>

                                    <button class="btn btn-sm btn-primary mt-2 w-100" type="submit">Entrar</button>
                                    
                                    <div class="d-flex justify-content-between">
                                        <a href="../public/check.php">Esqueceu a Senha?</a>
                                        <a href="../public/cadastrar.php">Cadastrar-se</a>
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

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    </body>
</html>