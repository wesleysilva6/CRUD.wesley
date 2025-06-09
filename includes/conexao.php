<?php
$host = "localhost";
$usuario = "root";
$senha = "";
$dbname = "crud_login";

// Cria a conexão
$conn = new mysqli($host, $usuario, $senha, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);    
}
?>