<?php
session_start();
require_once("funcoes/conexao.php");

if (!isset($_SESSION['id_usuario'])) {
    require_once("login.php");
}

$id_usuario = $_SESSION['id_usuario'];

// Função para redirecionamento
function redirecionar($mensagem, $pagina = "listar.php") {
    $_SESSION['mensagem'] = $mensagem;
    header("Location: $pagina");
    exit();
}

// Lógica de inserção
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_task'])) {
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $prioridade = $_POST['prioridade'];
    $status = isset($_POST['status']) ? $_POST['status'] : null;

    $stmt = $conectar->prepare("INSERT INTO tarefas (id_usuario, descricao, prioridade, status, titulo) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("issss", $id_usuario,  $descricao, $prioridade, $status, $titulo);
    
    if ($stmt->execute()) {
        redirecionar("Tarefa adicionada com sucesso!");
    } else {
        redirecionar("Erro ao adicionar a tarefa.", "listar.php");
    }
}

// Lógica de atualização
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_task'])) {
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $prioridade = $_POST['prioridade'];
    $status = $_POST['status'];
    $id_tarefa = $_POST['id'];

    $stmt = $conectar->prepare("UPDATE tarefas SET titulo = ?, descricao = ?, prioridade = ?, status = ? WHERE id = ?");
    $stmt->bind_param("ssssi", $titulo, $descricao, $prioridade, $status, $id_tarefa);
    
    if ($stmt->execute()) {
        redirecionar("Tarefa atualizada com sucesso!");
    } else {
        redirecionar("Erro ao atualizar a tarefa.", "listar.php");
    }
}

// Lógica de exclusão
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['action']) && $_GET['action'] == 'delete_task') {
    $id_tarefa = $_GET['id'];

    $stmt = $conectar->prepare("DELETE FROM tarefas WHERE id = ? AND id_usuario = ?");
    $stmt->bind_param("ii", $id_tarefa, $id_usuario);
    
    if ($stmt->execute()) {
        redirecionar("Tarefa excluída com sucesso!");
    } else {
        redirecionar("Erro ao excluir a tarefa.", "listar.php");
    }
}

?>
