<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarefas do Usuário</title>
    <link rel="stylesheet" href="CSS/listar.css">
</head>
<body>

<?php
// listar.php

session_start();
require_once("funcoes/conexao.php");

// Verificar se o usuário está logado
if (!isset($_SESSION['id_usuario'])) {
    require_once("login.php");
}

// Consulta para obter as informações do usuário e suas tarefas em ordem alfabética
$query_tarefas_usuario = "SELECT u.nome as nome_usuario, t.id, t.titulo, t.descricao, t.prioridade, t.status FROM usuario u
                          LEFT JOIN tarefas t ON u.id = t.id_usuario
                          WHERE u.id = ? ORDER BY u.nome ASC, t.titulo ASC";

// Preparar e executar a consulta
$stmt_tarefas_usuario = $conectar->prepare($query_tarefas_usuario);

// Verificar se a preparação da consulta foi bem-sucedida
if (!$stmt_tarefas_usuario) {
    die("Erro na preparação da consulta: " . $conectar->error);
}

$id_usuario_selecionado = isset($_GET['id_usuario']) ? $_GET['id_usuario'] : $_SESSION['id_usuario'];
$stmt_tarefas_usuario->bind_param("i", $id_usuario_selecionado);
$stmt_tarefas_usuario->execute();

// Verificar se a execução da consulta foi bem-sucedida
if (!$stmt_tarefas_usuario) {
    die("Erro na execução da consulta: " . $conectar->error);
}

$result_tarefas_usuario = $stmt_tarefas_usuario->get_result();

// Verificar se há tarefas para exibir
if ($result_tarefas_usuario->num_rows > 0) {
    // Exibir tarefas do usuário
    echo "<h2>Tarefas do Usuário Selecionado</h2>";
    echo "<p>Nome do Usuário: {$result_tarefas_usuario->fetch_assoc()['nome_usuario']}</p>";
    echo "<ul>";

    // Armazenar os resultados em um array
    $tarefas = $result_tarefas_usuario->fetch_all(MYSQLI_ASSOC);

    foreach ($tarefas as $row_tarefa) {
        echo "<li>{$row_tarefa['titulo']} - {$row_tarefa['descricao']} - Prioridade: {$row_tarefa['prioridade']} - Status: {$row_tarefa['status']} ";
        echo "<a href='editar_tarefa.php?id={$row_tarefa['id']}'>Editar</a> ";
        echo "<a href='operacoes.php?id_usuario={$id_usuario_selecionado}&action=delete_task&id={$row_tarefa['id']}'>Excluir</a><br>";
    }

    echo "</ul>";
} else {
    echo "<p>Nenhuma tarefa encontrada para este usuário.</p>";
}


// Mensagem e botão para adicionar tarefa
echo "<div class='button-container'>";
echo "<p>Deseja fazer outra tarefa?</p>";
echo "<a href='adicionar_tar.php' class='button'>Adicionar Tarefa</a>";
?>

</body>
</html>
