<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
    <link rel="stylesheet" href="CSS/style.css">

</head>
<body>
    <h1>Cadastro de Usuário</h1>
    
    <form method="post" action="cadastrar.php">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required><br> <br>
        <label for="login">Login:</label>
        <input type="text" name="login1" required><br> <br>
        <label for="senha">Senha:</label>
        <input type="password" name="senha" required><br> <br>
        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>
