<?php
        include '../../includes/conexao.php';
        session_start();

        require __DIR__ . '/../../vendor/autoload.php';

        use PhpOffice\PhpSpreadsheet\Spreadsheet;
        use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
        use PhpOffice\PhpSpreadsheet\Style\Border;
        use PhpOffice\PhpSpreadsheet\Style\Fill;

        $id_topico = $_GET['id_topico'] ?? null;
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $row = 1;

        $stmtTopico = $conn->prepare("SELECT nome_topico FROM topicos WHERE id_topico = ?");
        $stmtTopico->bind_param('i', $id_topico);
        $stmtTopico->execute();
        $resultTopico = $stmtTopico->get_result();

        if ($resultTopico->num_rows > 0) {
            $dadosTopico = $resultTopico->fetch_assoc();
            $nomeTopico = $dadosTopico['nome_topico'];
        }

        $sheet->setCellValue("A{$row}", "Tópico: " . $nomeTopico);
        $sheet->mergeCells("A{$row}:D{$row}");
        $sheet->getStyle("A{$row}")->getFont()->setBold(true)->setSize(14);
        $row++;
    
        $stmt = $conn->prepare("SELECT nome_produto, preco, quantidade, descricao FROM produtos WHERE topico_id = ?");
        $stmt->bind_param('i', $id_topico);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
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
            while ($produto = $result->fetch_assoc()) {
                $sheet->setCellValue("A{$row}", $produto['nome_produto']);
                $sheet->setCellValue("B{$row}", $produto['preco']);
                $sheet->setCellValue("C{$row}", $produto['quantidade']);
                $sheet->setCellValue("D{$row}", $produto['descricao']);
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
            $sheet->setCellValue("A{$row}", "Nenhum produto cadastrado neste tópico.");
            $sheet->mergeCells("A{$row}:D{$row}");
            $sheet->getStyle("A{$row}")->getFont()->setItalic(true)->setSize(12);
        }

        foreach (range('A', 'D') as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }

        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="tabela.xlsx"');

        $writer->save('php://output');
        exit;
        ?>
