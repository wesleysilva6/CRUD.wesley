<?php 
    include '../../includes/conexao.php';
    session_start();

    if ($_SESSION['simulacao'] == TRUE) {
        unset($_SESSION['simulacao']);
        header('location: ../../private/simular_venda.php?simulacao=limpa');
        exit;
    }
?>