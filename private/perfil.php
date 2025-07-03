<?php 
    include '../includes/core/conexao.php';

    date_default_timezone_set('America/Sao_Paulo');
    session_start();

    if (!isset($_SESSION['id'])) {
        header('Location: ../public/login.php?erro=acesso_negado');
        exit;
    }

    $usuario_id = $_SESSION['id'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estoque Aqui - Histórico</title>
    <link rel="shortcut icon" href="../assets/img/favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/perfil.css">
</head>
<body style="background:#000;">
    <?php include '../includes/components/sidebar.php' ?>
    
    <div class="card mx-auto" style="max-width: 700px;">
        <div class="card-header text-center">
            <h5 class="card-title mt-2 text-white">Atualizar Perfil</h5>
        </div>
    <div class="perfil text-center text-white mt-2">Meu Perfil</div>

        <form enctype="multipart/form-data" class="text-center">
            <div class="d-flex flex-column align-items-center justify-content-center">
                <img src="../assets/img/default.png" id="preview" class="img-preview mt-2" alt="Foto de Perfil">
                <label for="foto" class="upload-label mt-4 mb-3">Selecionar Foto</label>
                <input type="file" name="foto" id="foto" class="file-input" accept="image/*" onchange="mostrarPreview(this)">
            </div>
        </form>
        
        <div class="text-center text-white">
            <div class="nome"> <?php echo $_SESSION['nome']; ?> </div>
            <div class="email"> <?php echo $_SESSION['email']; ?> </div>
        </div>
        
        <div class="card-body">
            <form action="../modules/perfil/atualizar_nome.php" method="POST">
                <div class="mb-3 text-start">
                    <label class="form-label text-white">Editar Nome</label>
                    <input type="text" name="novo_nome" class="form-control" placeholder="Nome do Usuário" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Atualizar Nome</button>
            </form>
            
            <hr class="text-primary my-4">
            <form action="../modules/perfil/atualizar_senha.php" method="POST">
                
                <label class="form-label">Senha Atual</label>
                <div class="input-group mb-2">
                    <input type="password" class="form-control" name="senha" id="senhaAtual" placeholder="Digite uma Senha" required>
                    <button type="button" class="eyes btn btn-dark" id="toggleSenha">
                        <i class="bi bi-eye"></i>
                    </button>
                </div>
                
                <label class="form-label mt-2">Digite uma nova Senha</label>
                <div class="input-group mb-2">
                    <input type="password" class="form-control" name="nova_senha" id="novaSenha" placeholder="Confirme a Senha" required>
                    <button type="button" class="eyes btn btn-dark" id="toggleSenha2">
                        <i class="bi bi-eye"></i>
                    </button>
                </div>

                <label class="form-labelb mt-2">Confirmar Nova Senha</label>
                <div class="input-group mt-2">
                    <input type="password" id="confirmarSenha" name="confirmar_senha" class="form-control" placeholder="Confirme a nova senha" required>
                    <button type="button" class="eyes btn btn-dark" id="toggleSenha3">
                        <i class="bi bi-eye"></i>
                    </button>
                </div>
                <button type="submit" class="btn btn-primary w-100 mt-4">Atualizar Senha</button>
            </form>
        </div>
    </div>
    <script src="../assets/javascript/perfil.js"></script>
</body>
</html>