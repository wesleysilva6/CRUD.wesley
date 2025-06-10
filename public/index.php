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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    
    <title>Estoque Aqui - System</title>

    <style>
        ::-webkit-scrollbar {
        width: 8px;
        }

        ::-webkit-scrollbar-thumb {
        background:  #0B5ED7;
        }

        .navbar {
        background-color: #0C0F16;
        }

        h3 {
        font-family: 'Poppins', sans-serif;
        font-weight: 700;
        font-size: 2.5rem;
        color: #0B5ED7;
        letter-spacing: 0.5px;
        }

        p {
        font-family: 'Roboto', sans-serif;
        font-weight: 400;
        font-size: 1rem;
        color: #e0e0e0;
        line-height: 1.6;
        text-align:left;
        }

        .container {
        margin: 16rem 0 0 12rem; 
        color: #fff;
        }

        .container2 {
        justify-content:left;
        color: #fff;
        padding:15rem;
        }

        .btn {
        background-color:#0B5ED7;
        color:#fff;
        }

        .btn:focus, .btn:active, .btn:focus:active, .btn:visited, .btn:hover {
        background-color:rgb(6, 53, 124);
        color:#fff;
        }

        footer {
        background: #0C0F16;
        padding: 1rem 4%;
        margin: 14.19rem 0 0 0;
        }

    </style>
</head>

    <body style="background:#001">
        <nav class="navbar" data-bs-theme="dark">
            <div class="container-fluid">
                <a href="../public/index.php" class="navbar-brand">
                <img src="../assets/img/logo_stexto.png" width="65" height="65" alt=""> <img src="../assets/img/fundop2.png" alt="" width="85" height="65">
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="navbar-collapse" id="navbarToggleExternalContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a href="../private/login.php" class="nav-link">Entrar</a></li>
                        <li class="nav-item"><a href="../private/cadastrar.php" class="nav-link">Cadastrar</a></li>
                        <li class="nav-item"><a href="#sobre" class="nav-link">Sobre</a></li>
                    </ul>
                </div>
            </div>
        </nav>

            <section id="inicio">
                <div class="container ml-5">
                    <div class="row align-items-center justify-content-between">
                        
                        <div class="col-md-8">
                            <h3>Seja Bem-Vindo a ESTOQUE AQUI !</h3>
                            <p class="ml-5">Seja bem-vindo ao nosso Sistema de Controle de Estoque, uma plataforma completa, segura e eficiente desenvolvida para facilitar a gestão de produtos e materiais da sua empresa.
                            Com este sistema, você pode cadastrar, atualizar, excluir e acompanhar em tempo real todas as movimentações do seu estoque, garantindo organização, agilidade e total controle sobre suas operações.
                            Ideal para empresas que buscam precisão e praticidade, nossa ferramenta oferece uma interface intuitiva e responsiva, que se adapta a diferentes dispositivos e usuários.
                            Nosso compromisso é proporcionar uma experiência moderna e confiável, ajudando você a evitar perdas, controlar quantidades, e manter o seu estoque sempre atualizado com rapidez e segurança.
                            </p>
                            <a href="../private/login.php"><button class="btn">Login</button></a>
                            <a href="../private/cadastrar.php"><button class="btn">Cadastre-se</button></a>
                        </div>
                        
                        <div class="col-md-4 d-flex justify-content-end" id="logo">
                            <img src="../assets/img/caixa_fundop.png" alt="" class="postion-absolute d-none d-md-block" width="250rem" style="margin-right: -10rem;">
                        </div>
                        
                    </div>
                </div>
            </section>
            
            <section id="sobre">
                <div class="container2">
                    <div class="row align-items-center">
                            <div class="text-center mt-5">
                            <h3 class="text-center mt-5">SOBRE</h3>
                            <img src="../assets/img/fundop.png" alt="" width="350rem" class="">    
                                <p class=""><strong>O ESTOQUE AQUI</strong> é um sistema completo de controle de estoque desenvolvido para oferecer praticidade, organização e eficiência na gestão de produtos. A plataforma permite que você adicione novos itens ao seu estoque com facilidade, preenchendo informações essenciais como nome do produto, quantidade disponível, descrição detalhada e o horário exato da última atualização. Além disso, é possível atualizar rapidamente a quantidade de qualquer produto existente, refletindo em tempo real as movimentações do seu estoque. Caso algum item precise ser removido, o sistema também disponibiliza a função de exclusão com segurança, mantendo o histórico organizado e livre de informações desnecessárias. Com uma interface intuitiva e totalmente responsiva, o sistema se adapta a diferentes dispositivos, permitindo que você gerencie seu estoque de qualquer lugar. <strong>O ESTOQUE AQUI</strong> é a ferramenta ideal para empresas que buscam controle preciso, agilidade nas operações e um ambiente profissional para monitoramento contínuo dos seus produtos.</p>
                        </div>
                    </div>
                </div>
            </section>

            <footer>
                <div class="text-center"><img src="../assets/img/fundop.png" alt="" width="200rem" height="200rem"></div>
            </footer>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    </body>
</html>