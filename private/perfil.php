<?php
        session_start();
        date_default_timezone_set('America/Sao_Paulo');
        include '../includes/core/conexao.php';
        $usuario_id = $_SESSION['id'];

        if (!isset($_SESSION['id'])) {
        header('Location: ../public/login.php?erro=acesso_negado');
        exit;
        }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../public/assets/img/favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../public/assets/css/perfil.css">
    <title>Estoque Aqui - Perfil</title>
</head>
    <body>
        <?php include '../includes/components/sidebar.php' ?>

    <div class="card mx-auto" style="max-width: 700px;">
        <div class="card-header text-center">
            <h5 class="card-title mt-2 text-white">Atualizar Perfil</h5>
        </div>
    <div class="perfil text-center text-white mt-2">Meu Perfil</div>

        <form id="formFoto" action="../controllers/perfil/atualizar_foto.php" method="POST" enctype="multipart/form-data" class="text-center">
            <div class="d-flex flex-column align-items-center justify-content-center">
                <?php
                $foto = isset($_SESSION['foto']) && $_SESSION['foto'] !== '' ? $_SESSION['foto'] : 'user.png';
                $caminho = file_exists("../uploads/" . $foto) ? "../uploads/" . $foto : "../uploads/user.png";
                ?>
                <img src="<?php echo $caminho; ?>" id="preview" class="img-preview mb-3" alt="Foto de Perfil" style="max-width: 200px; border-radius: 50%;">

                <div class="d-flex align-items-center gap-2">
                    <label for="inputFoto" class="btn btn-primary">Escolher arquivo</label>
                    <a href="../controllers/perfil/deletar_foto.php" class="btn btn-danger" title="Remover Foto">
                        <i class="bi bi-trash3"></i>
                    </a>
                </div>

                <input type="file" name="foto" id="inputFoto" accept="image/*" style="display: none;">
                <canvas id="canvas" style="display: none;"></canvas>
                <img id="imagemCrop" style="max-width: 100%; display: none; margin-top: 15px;">
                <button id="btnCortar" type="button" class="btn btn-primary mt-3" style="display: none;">Salvar Foto</button>
            </div>
        </form>

        <div class="text-center text-white">
            <div class="nome mt-3"> <?php echo $_SESSION['nome']; ?> </div>
            <div class="email"> <?php echo $_SESSION['email']; ?> </div>
        </div>

        <div class="card-body">
            <form action="../controllers/perfil/atualizar_nome.php" method="POST">
                <div class="mb-3 text-start">
                    <label for="editarNome" class="form-label text-white">Editar Nome</label>
                    <input type="text" id="editarNome" name="novo_nome" class="form-control" placeholder="Nome do Usuário">

                <?php if(isset($_GET['status']) && $_GET['status'] == 'nome') { ?>
                    <div class="text-success">Nome atualizado com sucesso!</div>
                <?php } ?>

                <?php if(isset($_GET['nome']) && $_GET['nome'] == 'vazio') { ?>
                    <div class="text-danger">O nome não pode estar em branco.</div>
                <?php } ?>

                </div>
                <button type="submit" class="btn btn-primary w-100">Atualizar Nome</button>
            </form>

            <hr class="text-primary my-4">
            <form action="../controllers/perfil/atualizar_senha.php" method="POST">

                <label for="senhaAtual" class="form-label">Senha Atual</label>
                <div class="input-group mb-2">
                    <input type="password" class="form-control" name="senha" id="senhaAtual" placeholder="Digite uma Senha" required>
                    <button type="button" class="eyes btn btn-dark" id="toggleSenha">
                        <i class="bi bi-eye"></i>
                    </button>
                </div>

                <label for="novaSenha" class="form-label mt-2">Digite uma nova Senha</label>
                <div class="input-group mb-2">
                    <input type="password" class="form-control" name="nova_senha" id="novaSenha" placeholder="Confirme a Senha" required>
                    <button type="button" class="eyes btn btn-dark" id="toggleSenha2">
                        <i class="bi bi-eye"></i>
                    </button>
                </div>

                <label for="confirmarSenha" class="form-labelb mt-2">Confirmar Nova Senha</label>
                <div class="input-group mt-2">
                    <input type="password" id="confirmarSenha" name="confirmar_senha" class="form-control" placeholder="Confirme a nova senha" required>
                    <button type="button" class="eyes btn btn-dark" id="toggleSenha3">
                        <i class="bi bi-eye"></i>
                    </button>
                </div>

                <?php if (isset($_GET['senha']) && $_GET['senha'] == 'incorreta') { ?>
                    <div class="text-danger">A senha atual informada está incorreta.</div>
                <?php } ?>

                <?php if (isset($_GET['campos']) && $_GET['campos'] == 'vazios') { ?>
                    <div class="text-danger">Preencha todos os campos para atualizar sua senha.</div>
                <?php } ?>

                <?php if (isset($_GET['erro']) && $_GET['erro'] == 'senhas') { ?>
                    <div class="text-danger">As novas senhas digitadas não coincidem.</div>
                <?php } ?>

                <?php if (isset($_GET['alterada']) && $_GET['alterada'] == 'sucesso') { ?>
                    <div class="text-success">Senha Alterada com sucesso</div>
                <?php } ?>

                <div class="mt-2">
                    <a href="../public/check.php">Esqueceu a Senha?</a>
                    <button type="submit" class="btn btn-primary w-100 mt-1">Atualizar Senha</button>
                </div>
            </form>
        </div>
    </div>
        <script>
        setTimeout(() => {
            document.querySelectorAll('.text-danger, .text-success').forEach(al => {
                al.style.display = 'none'
            })
            history.replaceState(null, '', 'http://localhost:3000/private/perfil.php')
        }, 3500);
        </script>

        <script src="../public/assets/js/perfil.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.js"></script>
    </body>
</html>