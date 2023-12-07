<?php
require_once("funcoes/conexao.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Certifique-se de usar 'login' em vez de 'login1'
    $login = $_POST['login'];
    $senha = $_POST['senha'];

    // Verifique se $conn está definido antes de usar prepare()
    if (isset($conectar)) {
        $stmt = $conectar->prepare("SELECT id, senha FROM usuario WHERE login1 = ?");
        $stmt->bind_param("s", $login);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($senha, $row['senha'])) {
                session_start();
                $_SESSION['id_usuario'] = $row['id'];
                echo "Login efetivado";
                require_once("adicionar_tar.php");
                exit();  // Certifique-se de sair após redirecionar
            } else {
                echo "Senha incorreta";
            }
        } else {
            echo "Usuário não encontrado";
        }

        // Feche a instrução e a conexão
        $stmt->close();
        $conectar->close();
    } else {
        echo "Erro de conexão";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    <h1>Login</h1>
    
    <form method="post" action="">
        <label for="login">Login:</label>
        <input type="text" name="login" required><br><br>
        <label for="senha">Senha:</label>
        <input type="password" name="senha" required><br><br>
        <button type="submit">Entrar</button>
    </form>
</body>
</html>
