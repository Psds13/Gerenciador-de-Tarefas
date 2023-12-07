<?php
    $host = "localhost";
    $banco = "gerenciador";
    $cliente = "root";
    $senha = "";

    $conectar = new mysqli($host, $cliente, $senha, $banco);

if ($conectar ->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conectar->connect_error);
}
    return $conectar;
