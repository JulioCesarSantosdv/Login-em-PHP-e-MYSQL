<?php
require_once '../CLASS/users.php'; 

$u = new User();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = htmlspecialchars($_POST['nome']);
    $telefone = htmlspecialchars($_POST['telefone']);
    $email = htmlspecialchars($_POST['email']);
    $senha = htmlspecialchars($_POST['senha']);
    $confirmarSenha = htmlspecialchars($_POST['confSenha']);

    if (!empty($nome) && !empty($telefone) && !empty($email) && !empty($senha) && !empty($confirmarSenha)) {
        $u->conectar("projeto_login", "localhost", "root", "");
        if ($u->msgErro === "") {
            if ($senha === $confirmarSenha) {
                if ($u->cadastrar($nome, $telefone, $email, $senha)) {
                    echo "Cadastrado com sucesso! <a href='login.php'>Clique aqui para fazer login</a>";
                } else {
                    echo "Email já cadastrado!";
                }
            } else {
                echo "As senhas não coincidem!";
            }
        } else {
            echo "Erro ao conectar ao banco de dados: " . $u->msgErro;
        }
    } else {
        echo "Preencha todos os campos!";
    }
} else {
    echo "Método de solicitação inválido.";
}
?>
