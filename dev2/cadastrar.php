<?php
require_once("funcoes/conexao.php") ;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $login = $_POST['login1'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    $stmt = $conectar->prepare("INSERT INTO usuario (nome, login1, senha) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nome, $login, $senha);
    
    if ($stmt->execute()) {
        echo "Usuário cadastrado com sucesso!";
        require_once("adicionar_tar.php") ;
    } else {
        echo "Erro ao cadastrar o usuário.";
    }

    $stmt->close();
    $conectar->close();
}
?>