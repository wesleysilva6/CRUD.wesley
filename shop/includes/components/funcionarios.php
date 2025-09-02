<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
</head>
<body>
        <div id="vendedores" class="tab-section" style="display:none;">
            <form id="formFuncionario" action="../controllers/configs/cadastrar_funcionario.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="nomeFuncionario">Nome do Funcionário</label>
                    <input type="text" class="form-control" name="nome_funcionario" id="nomeFuncionario" placeholder="Nome do Funcionário">
                </div>
                <div class="mb-3">
                    <label for="cargoFuncionario">Cargo do Funcionário</label>
                    <select name="cargo_funcionario" id="cargoFuncionario" class="form-select">
                        <option value="Estoquista">Estoquista</option>
                        <option value="Vendedor">Vendedor</option>
                        <option value="Gerente">Gerente</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="emailFuncionario">Email do Funcionário</label>
                    <input type="email" class="form-control" name="email_funcionario" id="emailFuncionario" placeholder="Email do Funcionário">
                </div>
                <div class="mb-3">
                    <label for="telFuncionario">Telefone do Funcionário</label>
                    <input type="text" class="form-control" name="tel_funcionario" id="telFuncionario" placeholder="Telefone do Funcionário">
                </div>
                <div class="mb-3">
                    <label for="salarioFuncionario">Sálario do Funcionário</label>
                    <input type="number" class="form-control" name="salario_funcionario" id="salarioFuncionario" step="0.01" min="0" placeholder="Sálario do Funcionário">
                </div>
                <div class="mb-3">
                    <label for="statusFuncionario">Status do Funcionário</label>
                    <select name="status_funcionario" id="statusFuncionario" class="form-select">
                        <option value="Ativo">Ativo</option>
                        <option value="Inativo">Inativo</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="fotoFuncionario">Foto do Funcionário</label>
                    <input type="file" name="foto_funcionario" id="fotoFuncionario">
                </div>
                <button type="button" class="btn btn-primary" id="cadastrarFuncionario"> Cadastrar Funcionário </button>
            </form>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>