<?php
require_once("funcoes/conexao.php");

// Inicialize as variáveis
$id_tarefa = $titulo = $descricao = $prioridade = $status = '';

// Verifique se o ID da tarefa está presente na URL
if (isset($_GET["id"])) {
    $id_tarefa = $_GET["id"];

    // Consulta para obter os detalhes da tarefa pelo ID
    $query = "SELECT * FROM tarefas WHERE id = ?";
    $stmt = $conectar->prepare($query);

    if ($stmt) {
        $stmt->bind_param("i", $id_tarefa);
        $stmt->execute();

        if ($stmt->errno) {
            echo "Erro na execução da consulta: " . $stmt->error;
        }

        $result = $stmt->get_result();

        if ($result) {
            $row = $result->fetch_assoc();

            // Sanitização
            $titulo = htmlspecialchars($row["titulo"]);
            $descricao = htmlspecialchars($row["descricao"]);
            $prioridade = htmlspecialchars($row["prioridade"]);
            $status = htmlspecialchars($row['status']);
        } else {
            echo "Erro ao recuperar os detalhes da tarefa.";
        }

        $stmt->close();
    } else {
        echo "Erro ao preparar a consulta.";
    }
} else {
    echo "ID da tarefa não fornecido.";
}
?>

<!-- Código HTML do formulário -->
<link rel="stylesheet" href="CSS/style.css">
<form method="post" action="operacoes.php">
    <h2>Fique a vontade para alterar</h2> <br> 
    <input type="hidden" name="id" value="<?php echo $id_tarefa; ?>">
    <label>Título: <input type="text" name="titulo" value="<?php echo $titulo; ?>"></label><br> <br>
    <label>Descrição: <input type="text" name="descricao" value="<?php echo $descricao; ?>"></label><br> <br>
    <label>Prioridade: <input type="text" name="prioridade" value="<?php echo $prioridade; ?>"></label><br> <br>
    <label>Status: <input type="text" name="status" value="<?php echo $status; ?>"></label><br> <br>
    <input type="hidden" name="update_task" value="1">
    <input type="submit" value="Atualizar">
</form>
