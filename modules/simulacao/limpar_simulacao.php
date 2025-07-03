<?php 
    include '../../includes/core/conexao.php';
    session_start();

    if ($_SESSION['simulacao'] == TRUE) {
        unset($_SESSION['simulacao']);
        header('location: ../../private/simulacao.php?simulacao=limpa');
        exit;
    } else {
        header('location: ../../private/simulacao.php?produtos=inexistentes');
        exit;
    }
?>