<?php 
        session_start();
        require_once __DIR__ . '/../includes/core/bootstrap.php';
        require_once '../includes/core/conexao.php';
        
        date_default_timezone_set('America/Sao_Paulo');
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../public/assets/css/historico.css">
    <script src="../public/assets/js/core/modals.js" defer></script>
    <title>Estoque Aqui - Histórico</title>
</head>
    <body>
        <?php view('modals') ?>
        <?php view('sidebar') ?>

    <div class="card">
        <div class="card-header text-white">
            <?php 
                $msg = [
                    'produto' => [
                        'removido' => ['danger', 'Produto removido com sucesso']
                    ],
                    'produtos' => [
                        'removidos' => ['danger', 'Todos os produtos foram removidos do histórico com sucesso!']
                    ],
                ];

                foreach ($msg as $param => $opcoes) {
                    if(isset($_GET[$param]) && isset($opcoes[$_GET[$param]])) {
                        [$tipo, $mensagem] = $opcoes[$_GET[$param]];
                        echo "<div class='alert alert-$tipo'>$mensagem</div> ";
                    }
                }
            ?>
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
                            <th>Criada em</th>
                            <th>Subtotal</th>
                            <th>Deletar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $total = 0;
                        $stmt = $conn->prepare("SELECT i.id AS id_item, s.cliente, 
                        DATE_FORMAT(s.criada_em, '%d/%m/%Y %H:%i') AS criada_em, i.nome_produto, i.quantidade, i.preco, i.subtotal 
                        FROM simulacoes s 
                        INNER JOIN itens_simulacao i ON s.id = i.id_simulacao 
                        WHERE s.usuario_id = ? ORDER BY s.criada_em DESC ");
                            $stmt->bind_param('i', $usuario_id);
                            $stmt->execute();
                            $result = $stmt->get_result() ?>
                        <?php while($linha = $result->fetch_assoc()) { ?>
                            <?php $total += $linha['subtotal']; ?>
                                <td> <?php echo $linha['cliente'] ?></td>
                                <td> <?php echo $linha['nome_produto'] ?></td>
                                <td> <?php echo $linha['quantidade'] ?></td>
                                <td> <?php echo 'R$ '. number_format($linha['preco'], 2, ',', '.'); ?> </td>
                                <td> <?php echo $linha['criada_em'] ?></td>
                                <td> <?php echo 'R$ '. number_format($linha['subtotal'], 2, ',', '.'); ?> </td>
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
                        <tfoot>
                            <tr class="table-dark">
                                <th colspan="5" class="text-end text-white">Subtotal Geral:</th>
                                <th>R$ <?php echo number_format($total, 2, ',', '.'); ?></th>
                            </tr>
                        </tfoot>
                </table>
            </div>
            <div class="d-flex justify-content-center">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#limparHistorico">Excluir todas as Simulações</button>
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