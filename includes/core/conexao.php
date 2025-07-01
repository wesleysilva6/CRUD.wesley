<?php
    $host = "localhost";
    $usuario = "root";
    $senha = "";
    $dbname = "crud_login";

    $conn = new mysqli($host, $usuario, $senha, $dbname);

    if ($conn->connect_error) {
        die("Erro na conexão: " . $conn->connect_error);    
    }
?>