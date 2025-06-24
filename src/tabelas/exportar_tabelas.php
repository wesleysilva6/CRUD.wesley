<?php
    include '../../includes/conexao.php';
    session_start();

    require __DIR__ . '/../../vendor/autoload.php';

    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
    use PhpOffice\PhpSpreadsheet\Style\Border;
    use PhpOffice\PhpSpreadsheet\Style\Fill;

    $usuario_id = $_SESSION['id'] ?? null;
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    $row = 1;

    $topicos = $conn->query("SELECT id_topico, nome_topico FROM topicos WHERE usuario_id = $usuario_id");
        while ($topico = $topicos->fetch_assoc()) {
        $topico_nome = $topico['nome_topico'];
        $topico_id = $topico['id_topico'];

        $sheet->setCellValue("A{$row}", "Tópico: " . $topico_nome);
        $sheet->getStyle("A{$row}")->getFont()->setBold(true)->setSize(14);
        $row++;

        $sheet->setCellValue("A{$row}", "Nome");
        $sheet->setCellValue("B{$row}", "Preço");
        $sheet->setCellValue("C{$row}", "Quantidade");
        $sheet->setCellValue("D{$row}", "Descrição");

        $sheet->getStyle("A{$row}:D{$row}")->applyFromArray([
            'font' => ['bold' => true, 'color' => ['rgb' => 'FFFFFF']],
            'fill' => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['rgb' => '0B5ED7']],
            'alignment' => ['horizontal' => 'center', 'vertical' => 'center'],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['rgb' => '000000']
                ],
            ],
        ]);
    $row++;

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
            $sheet->setCellValue("A{$row}", "Nenhum produto cadastrado.");
            $sheet->mergeCells("A{$row}:D{$row}");
            $sheet->getStyle("A{$row}")->getFont()->setItalic(true);
            $row++;
        }
    $row++;
        }

        foreach (range('A', 'D') as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }

        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="tabelas.xlsx"');

        $writer->save('php://output');
        exit;
