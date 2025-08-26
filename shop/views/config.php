<?php
    session_start();
    require_once '../../includes/core/conexao.php';

    $usuario_id = $_SESSION['id'];

    if (!isset($_SESSION['id'])) {
        header('Location: ../../public/login.php?erro=acesso_negado');
        exit;
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../../public/assets/img/favicon.ico" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Painel de Vendas - Configurações</title>
    <link rel="stylesheet" href="../assets/css/config.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <script src="../assets/js/core/main.js" defer></script>
</head>
<body>
    <?php include '../includes/components/sidebar.php' ?>
        <div class="content" id="content">
            <div class="dash d-flex justify-content-between align-items-center mb-4">
                <button id="toggleSidebar"><i class="bi bi-arrow-bar-left"></i></button>
                <h2>Configurações</h2>
                <div class="d-flex align-items-center">
                    <input type="text" class="form-control me-2" placeholder="Pesquisar">
                    <?php $foto = isset($_SESSION['foto']) && $_SESSION['foto'] !== '' ? $_SESSION['foto'] : 'user.png'; $caminho = "../../../uploads/" . $foto; ?>
                    <img src="<?php echo $caminho; ?>" alt="Foto de Perfil" class="rounded-circle" width="40" height="40">
                </div>
            </div>

            <nav class="nav nav-underline custom-nav">
                <li class="nav-item">
                    <a class="nav-link active" data-tab="home"> Sistema</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-tab="vendas"> Vendas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-tab="config"> Segurança</a>
                </li>
            </nav>

            <div class="container mt-4">
                <div id="home" class="tab-section">  
                    <h4>Home</h4>
                    <p>Conteúdo livre da Home.</p>
                </div>

                <div id="vendas" class="tab-section" style="display:none;">  
                    <h4>Vendas</h4>
                    <p>Conteúdo livre de Vendas.</p>
                </div>

                <div id="config" class="tab-section" style="display:none;">  
                    <h4>Configurações</h4>
                    <p>Conteúdo livre de Configurações.</p>
                </div>
            </div>
        </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const links = document.querySelectorAll('.nav-link');
        const sections = document.querySelectorAll('.tab-section');

        links.forEach(link => {
        link.addEventListener('click', () => {
            // Atualiza classe active
            links.forEach(l => l.classList.remove('active'));
            link.classList.add('active');

            // Mostra a aba correta
            const tab = link.getAttribute('data-tab');
            sections.forEach(sec => {
            sec.style.display = (sec.id === tab) ? 'block' : 'none';
                });
            });
        });
    </script>
</body>
</html>