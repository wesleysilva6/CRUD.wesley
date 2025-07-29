<?php
        session_start();
        include '../includes/core/conexao.php';
        include '../includes/components/modals.php';
        date_default_timezone_set('America/Sao_Paulo');

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../public/assets/css/home.css">
    <script src="../public/assets/js/pages/home.js" defer></script>
    <script src="../public/assets/js/core/modals.js" defer></script>
    <title>Estoque Aqui - Home</title>
</head>
    <body>
        <?php include '../includes/components/sidebar.php' ?>

        <div class="container-txt mt-5 d-flex justify-content-center" style="border:none;">
            <div class="alert alert-primary text-center"> Seja Muito Bem-Vindo(a) <?php echo $_SESSION['nome']; ?> ao seu Sistema de ESTOQUE !</div>
        </div>

        <div class="btn-topico">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTopico"><i class="bi bi-plus-circle"> Adicionar Tópico</i></button>
            <a href="../controllers/tabelas/exportar_tabelas.php" class="btn btn-primary"><i class="bi bi-box-arrow-in-up-right"> Exportar Tabelas</i></a>
        </div>

                <?php 
                $usuario_id = $_SESSION['id'];
                $stmt = $conn->prepare("SELECT id_topico, nome_topico FROM topicos WHERE usuario_id = ?");
                $stmt->bind_param("i", $usuario_id);
                $stmt->execute();
                $result = $stmt->get_result();
                    while ($topico = $result->fetch_assoc()) {
                        $produtos = $conn->query("SELECT *, 
                        DATE_FORMAT(criado_em, '%d/%m/%Y %H:%i') AS criado_em, 
                        DATE_FORMAT(atualizado_em, '%d/%m/%Y %H:%i') AS atualizado_em
                        FROM produtos 
                        WHERE topico_id = " . intval($topico['id_topico'])); ?>

    <div class="container pb-5 mb-5 mt-3">
            <h4 class="my-3" style="color:#fff"> <?php echo htmlspecialchars($topico['nome_topico']); ?> </h4>
            <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Imagem</th>
                        <th>Produto</th>
                        <th>Preço</th>
                        <th>Quantidade</th>
                        <th>Descrição</th>
                        <th>Data de Criação</th>
                        <th>Última atualização</th>
                        <th>Editar</th>
                        <th>Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($produto = $produtos->fetch_assoc()) { ?>
                        <tr>
                            <td>
                            <?php if (!empty($produto['imagem'])) { ?>
                                <img src="/<?php echo $produto['imagem']; ?>"
                                    width="60"
                                    height="60"
                                    style="object-fit:cover; border-radius:8px; cursor: pointer;"
                                    data-bs-toggle="modal"
                                    data-bs-target="#modalImagem"
                                    onclick="mostrarImagem('<?php echo $produto['imagem']; ?>')"
                                >
                            <?php } else { ?>
                                <span class="text-muted"></span>
                            <?php } ?>
                            </td>
                            <td> <?php echo ($produto['nome_produto']); ?> </td>
                            <td> <?php echo 'R$ '. number_format($produto['preco'], 2, ',', '.'); ?> </td>
                            <td> <?php echo $produto['quantidade']; ?> </td>
                            <td> <?php echo ($produto['descricao']); ?> </td>
                            <td> <?php echo $produto['criado_em']; ?> </td>
                            <td> <?php echo $produto['atualizado_em']; ?> </td>

                            <td> 
                                <button class="btn"
                                data-id="<?php echo $produto['id']; ?>"
                                data-id-topico="<?php echo $topico['id_topico']; ?>"
                                data-produto="<?php echo htmlspecialchars($produto['nome_produto']); ?>"
                                data-preco="<?php echo $produto['preco']; ?>"
                                data-quantidade="<?php echo $produto['quantidade']; ?>"
                                data-desc="<?php echo htmlspecialchars($produto['descricao']); ?>"
                                data-bs-toggle="modal"
                                data-bs-target="#editarModal"
                                onclick="preencherModalEditar(this)">
                                <span class="icon"><i class="bi bi-pencil-square"></i></span>
                                </button>
                            </td>

                            <td>
                                <button class="btn"
                                data-bs-toggle="modal"
                                data-bs-target="#removerProduto"
                                data-id-produto="<?php echo $produto['id'] ?>"> 
                                <span class="icon"><i class="bi bi-trash3"></i></span> 
                                </button> 
                            </td>

                        </tr>
                        <?php } ?>
                    </tbody>
                </table>

                        <button 
                            class="btn btn-primary mt-5"
                            data-bs-toggle="modal"
                            data-bs-target="#removerTopico"
                            data-id-topico="<?php echo $topico['id_topico']; ?>">
                            <i class="bi bi-trash3"> Excluir Tópico</i>
                        </button>

                <button type="button" class="btn btn-primary mt-5" data-bs-toggle="modal" data-bs-target="#modalProduto" onclick="setIdTopico(<?php echo $topico['id_topico']; ?>)"><i class="bi bi-plus-circle"> Adicionar Produto </i></button>
                <a href="../controllers/tabelas/exportar_tabela.php?id_topico=<?php echo $topico['id_topico']; ?>" class="btn btn-primary mt-5"><i class="bi bi-box-arrow-in-up-right"> 
                Exportar Tabela </i></a>
        </div>
    </div>
        <?php } ?>

        <script>
            setTimeout(() => {
                history.replaceState(null, '', 'http://localhost:3000/private/home.php')
            }, 3000);
        </script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    </body>
</html>