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
    <link rel="shortcut icon" href="../assets/img/favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../assets/css/historico.css">
    <script src="../assets/js/main.js"></script>
    <title>Estoque Aqui - Histórico</title>
</head>
    <body>
        <?php include '../includes/components/sidebar.php'; ?>
        <?php include '../includes/components/modals.php'; ?>

    <div class="card">
        <div class="card-header text-white">

            <?php if (isset($_GET['produto']) == 'removido') { ?>
                <div class="alert alert-danger">Produto removido com sucesso</div>
            <?php } ?>

            <h5 class="card-title mt-2">Histórico de Simulações</h5>
        </div>

        <div class="card-body text-white">
            <div class="mb-3">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nome Cliente</th>
                            <th>Produto</th>
                            <th>Quantidade</th>
                            <th>Preço</th>
                            <th>Subtotal</th>
                            <th>Criada em</th>
                            <th>Deletar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $stmt = $conn->prepare("SELECT i.id AS id_item, s.cliente, 
                        DATE_FORMAT(s.criada_em, '%d/%m/%Y %H:%i') AS criada_em, i.nome_produto, i.quantidade, i.preco, i.subtotal 
                        FROM simulacoes s 
                        INNER JOIN itens_simulacao i ON s.id = i.id_simulacao 
                        WHERE s.usuario_id = ? ORDER BY s.criada_em DESC ");
                            $stmt->bind_param('i', $usuario_id);
                            $stmt->execute();
                            $result = $stmt->get_result() ?>
                        <?php while($linha = $result->fetch_assoc()) { ?>
                            <tr>
                                <td> <?php echo $linha['cliente'] ?></td>
                                <td> <?php echo $linha['nome_produto'] ?></td>
                                <td> <?php echo $linha['quantidade'] ?></td>
                                <td> <?php echo 'R$ '. number_format($linha['preco'], 2, ',', '.'); ?> </td>
                                <td> <?php echo 'R$ '. number_format($linha['subtotal'], 2, ',', '.'); ?> </td>
                                <td> <?php echo $linha['criada_em'] ?></td>
                            <td>
                                <button class="btn"
                                data-bs-toggle="modal"
                                data-bs-target="#removerSimulacao"
                                data-id-item="<?php echo $linha['id_item'] ?>"> 
                                <span class="icon"><i class="bi bi-trash3"></i></span> 
                                </button>
                            </td>

                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

        <script>
        setTimeout(() => {
            document.querySelectorAll('.alert').forEach(al => {
                al.style.display = 'none'
            })
            history.replaceState(null, '', 'http://localhost:3000/private/historico.php')
        }, 3000);
        </script>
    </body>
</html>