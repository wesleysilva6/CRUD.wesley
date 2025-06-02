<?php
$host = "localhost";
$usuario = "root";
$senha = "";
$banco = "crud_login";

// Cria a conexão
$conn = new mysqli($host, $usuario, $senha, $banco);

// Verifica a conexão
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}
?>
