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
        .container {
            margin: 16rem 0 0 12rem; 
            color: #fff;
        }

        .navbar {
        background-color: #0C0F16;
    }

        .btn {
        background-color: #006853;
        color:#fff;
        }

        .btn:focus, .btn:active, .btn:focus:active, .btn:visited, .btn:hover {
        background-color:rgb(0, 75, 60);
        color:#fff
    }
    </style>


</head>
    <body style="background:#000">

        <nav class="navbar" data-bs-theme="dark">
            <div class="container-fluid">
                <a href="index.php" class="navbar-brand">
                <img src="../assets/img/logo_stexto.png" width="65" height="65" alt=""> <img src="../assets/img/fundop2.png" alt="" width="85" height="65">
                
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="navbar-collapse" id="navbarToggleExternalContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a href="login.php" class="nav-link">Entrar</a></li>
                        <li class="nav-item"><a href="cadastrar.php" class="nav-link">Cadastrar</a></li>
                        <li class="nav-item"><a href="#sobre" class="nav-link">Sobre</a></li>
                    </ul>
                </div>
            </div>
        </nav>

            <section id="inicio">
                <div class="container">
                    <div class="row align-items-center justify-content-between">
                        
                        <div class="col-md-8">
                            <h3>Seja Bem-Vindo a ESTOQUE AQUI !</h3>
                            <p>Seja bem-vindo ao nosso Sistema de Controle de Estoque, uma plataforma completa, segura e eficiente desenvolvida para facilitar a gestão de produtos e materiais da sua empresa.
                            Com este sistema, você pode cadastrar, atualizar, excluir e acompanhar em tempo real todas as movimentações do seu estoque, garantindo organização, agilidade e total controle sobre suas operações.
                            Ideal para empresas que buscam precisão e praticidade, nossa ferramenta oferece uma interface intuitiva e responsiva, que se adapta a diferentes dispositivos e usuários.
                            Nosso compromisso é proporcionar uma experiência moderna e confiável, ajudando você a evitar perdas, controlar quantidades, e manter o seu estoque sempre atualizado com rapidez e segurança.
                            </p>
                            <a href="login.php"><button class="btn">Login</button></a>
                            <a href="cadastrar.php"><button class="btn">Cadastre-se</button></a>
                        </div>

                        <div class="col-md-4 d-flex justify-content-end" id="logo">
                            <img src="../assets/img/caixa_fundop.png" alt="" class="postion-absolute d-none d-md-block" width="250rem" style="margin-right: -10rem;">
                        </div>

                    </div>
                </div>
            </section>

            <section id="sobre">
                <div class="container">
                    
                </div>
            </section>


            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    </body>
</html>