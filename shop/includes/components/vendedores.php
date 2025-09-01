<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
</head>
<body>
        <div id="vendedores" class="tab-section" style="display:none;">
            <form id="formVendedor" action="../controllers/configs/adicionar_vendedor.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="">Nome do Vendedor</label>
                    <input type="text" class="form-control" name="nome_vendedor" placeholder="Nome do Vendedor">
                </div>
                <div class="mb-3">
                    <label for="">Email do Vendedor</label>
                    <input type="email" class="form-control" name="email_vendedor" placeholder="Email do Vendedor">
                </div>
                <div class="mb-3">
                    <label for="">Telefone do Vendedor</label>
                    <input type="text" class="form-control" name="tel_vendedor" placeholder="Telefone do Vendedor">
                </div>
                <div class="mb-3">
                    <label for="">Foto do Vendedor</label>
                    <input type="file" name="foto_vendedor">
                </div>
                <button type="button" class="btn btn-primary" id="cadastrarVendedor"> Cadastrar Vendedor </button>
            </form>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>