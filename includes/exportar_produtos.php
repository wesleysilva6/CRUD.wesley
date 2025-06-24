<?php
session_start();

require __DIR__ . '/../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;

// conexão com banco
    $conn = new mysqli('localhost', 'root', '', 'crud_login');
    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }

    $user_id = $_SESSION['id'] ?? null;
    if (!$user_id) {
        die("Usuário não logado.");
    }

    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    $row = 1;

// Primeiro, buscar todos os tópicos do usuário
    $topicos = $conn->query("SELECT id_topico, nome_topico FROM topicos WHERE usuario_id = $user_id");

    while ($topico = $topicos->fetch_assoc()) {
    $topico_nome = $topico['nome_topico'];
    $topico_id = $topico['id_topico'];

    // Exibir nome do tópico
    $sheet->setCellValue("A{$row}", "Tópico: " . $topico_nome);
    $sheet->getStyle("A{$row}")->getFont()->setBold(true)->setSize(14);
    $row++;

    // Cabeçalho da tabela
    $sheet->setCellValue("A{$row}", "Nome");
    $sheet->setCellValue("B{$row}", "Preço");
    $sheet->setCellValue("C{$row}", "Quantidade");
    $sheet->setCellValue("D{$row}", "Descrição");

    // Estilo do cabeçalho
    $sheet->getStyle("A{$row}:D{$row}")->applyFromArray([
        'font' => ['bold' => true, 'colaor' => ['rgb' => 'FFFFFF']],
        'fill' => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['rgb' => '4F81BD']],
        'alignment' => ['horizontal' => 'center', 'vertical' => 'center'],
        'borders' => [
            'allBorders' => [
                'borderStyle' => Border::BORDER_THIN,
                'color' => ['rgb' => '000000']
            ],
        ],
    ]);

    $row++;

    // Buscar produtos desse tópico
    $produtos = $conn->query("SELECT nome_produto, preco, quantidade, descricao FROM produtos WHERE topico_id = $topico_id");

    if ($produtos->num_rows > 0) {
        while ($produto = $produtos->fetch_assoc()) {
            $sheet->setCellValue("A{$row}", $produto['nome_produto']);
            $sheet->setCellValue("B{$row}", $produto['preco']);
            $sheet->setCellValue("C{$row}", $produto['quantidade']);
            $sheet->setCellValue("D{$row}", $produto['descricao']);
            $sheet->setCellValue("B{$row}", $produto['preco']);
            $sheet->getStyle("B{$row}")
                ->getNumberFormat()
                ->setFormatCode('R$ #,##0.00');

            // Bordas nas linhas de dados
            $sheet->getStyle("A{$row}:D{$row}")->applyFromArray([
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => Border::BORDER_THIN,
                        'color' => ['rgb' => '000000'],
                    ],
                ],
            ]);
            $row++;
        }
    } else {
        // Se não houver produtos, exibir uma linha informando
        $sheet->setCellValue("A{$row}", "Nenhum produto cadastrado.");
        $sheet->mergeCells("A{$row}:D{$row}");
        $sheet->getStyle("A{$row}")->getFont()->setItalic(true);
        $row++;
    }

    // Linha em branco para separar os tópicos
    $row++;
}

// Ajustar largura automática
foreach (range('A', 'D') as $col) {
    $sheet->getColumnDimension($col)->setAutoSize(true);
}

$writer = new Xlsx($spreadsheet);

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="produtos_por_topico.xlsx"');

$writer->save('php://output');
exit;
