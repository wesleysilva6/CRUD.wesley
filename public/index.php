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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Estoque Aqui - System</title>
</head>
    <body>
        <nav class="navbar" data-bs-theme="dark">
            <div class="container-fluid">
                <a href="index.php" class="navbar-brand">
                <img src="assets/img/logo_stexto.png" width="65" height="65" alt=""> <img src="assets/img/fundop2.png" alt="" width="85" height="65">
                </a>
            </div>
        </nav>

            <section id="inicio">
                <div class="container">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-md-8">
                            <h3>Seja Bem-Vindo a ESTOQUE AQUI !</h3>
                            <p>Seja bem-vindo ao nosso Sistema de Controle de Estoque, uma plataforma completa, segura e eficiente, desenvolvida para facilitar a gestão de produtos e  materiais da sua empresa.
                            Com este sistema, você pode cadastrar, atualizar, excluir e acompanhar em tempo real todas as movimentações do seu estoque, garantindo organização, agilidade e total controle sobre suas operações.
                            Ideal para empresas que buscam precisão e praticidade, nossa ferramenta oferece uma interface simples e fácil de usar, ajudando você a evitar perdas, controlar quantidades e manter seu estoque sempre atualizado com rapidez e segurança.
                            Agora, além de todas essas funcionalidades, o sistema conta também com a opção de exportar os dados do estoque para planilhas Excel, seja de um tópico específico ou de toda a base de dados, facilitando ainda mais a análise, controle e geração de relatórios personalizados.</p>
                            <a href="login.php" class="btn">Login</a>
                            <a href="cadastrar.php" class="btn">Cadastre-se</a>
                        </div>

                        <div class="col-md-4 d-flex justify-content-end" id="logo">
                            <img src="assets/img/caixa_fundop.png" alt="" class="postion-absolute d-none d-md-block" width="250rem" style="margin-right: -10rem;">
                        </div>
                    </div>
                </div>
            </section>

            <section id="sobre">
                <div class="container2">
                    <div class="row align-items-center">
                            <div class="text-center mt-5">
                            <h3 class="text-center mt-5">SOBRE</h3>
                            <img src="assets/img/fundop.png" alt="" width="350rem" class="img-sobre">
                                <p><strong>O ESTOQUE AQUI</strong> é um sistema completo de controle de estoque desenvolvido para oferecer praticidade, organização e eficiência na gestão de produtos. A plataforma permite que você adicione novos itens ao seu estoque com facilidade, preenchendo informações essenciais como nome do produto, quantidade disponível, descrição detalhada e o horário exato da última atualização. Além disso, é possível atualizar rapidamente a quantidade de qualquer produto existente, refletindo em tempo real as movimentações do seu estoque. Caso algum item precise ser removido, o sistema também disponibiliza a função de exclusão com segurança, mantendo o histórico organizado e livre de informações desnecessárias. Você pode exportar os dados de um tópico específico ou de todo o estoque, facilitando análises, auditorias e acompanhamento das informações fora do sistema. <strong>O ESTOQUE AQUI</strong> é a ferramenta ideal para empresas que buscam controle preciso, agilidade nas operações e um ambiente profissional para monitoramento contínuo dos seus produtos.</p>
                        </div>
                    </div>
                </div>
            </section>

            <?php 
                include '../includes/components/footer.php'
            ?>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    </body>
</html>