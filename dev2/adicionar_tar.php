
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciador de Tarefas</title>
    <link rel="stylesheet" href="CSS/adicionar.css">
</head>
<body>
    <h1>Gerenciador de Tarefas</h1>
    
    <form method="post" action="operacoes.php">
    <label for="titulo">Titulo:</label>
        <input type="text" name="titulo" required><br>
        <label for="descricao">Nova Tarefa:</label>
        <input type="text" name="descricao" required><br>
        <label for="prioridade">Prioridade:</label>
        <select name="prioridade">
            <option value="Alta">Alta</option>
            <option value="Média">Média</option>
            <option value="Baixa">Baixa</option>
        </select>
        <label for="status">Status:</label>
        <select name="status">
            <option value="pendente">Pendente</option>
            <option value="concluida">Concuída</option>
        </select>
        <br>
        <button type="submit" name="add_task">Adicionar Tarefa</button>
    </form>

    