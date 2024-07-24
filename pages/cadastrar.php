<!DOCTYPE html>
<?php
require_once '../CLASS/users.php'; // Adicionado ponto e vírgula
$u = new User(); // Supondo que a classe se chama User
?>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projeto Login</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <video autoplay muted loop id="bg-video">
        <source src="../video/fundo6.mp4" type="video/mp4">
        Seu navegador não suporta a tag de vídeo.
    </video>
    <div id="form-body-cad">
        <h1>Cadastrar</h1>
        <form method="POST" action="process.php">
            <input type="text" name="nome" placeholder="Nome Completo" maxlength="30">
            <input type="text" name="telefone" placeholder="Telefone" maxlength="30">
            <input type="email" name="email" placeholder="Usuário" maxlength="40">
            <input type="password" name="senha" placeholder="Senha" maxlength="15">
            <input type="password" name="confSenha" placeholder="Confirmar Senha" maxlength="15"> <!-- Corrigido para confSenha -->
            <input type="submit" value="CADASTRAR">
        </form>
    </div>
    <?php
    // Verificar se clicou no botão
    if (isset($_POST['nome'])) {
        $nome = htmlspecialchars($_POST['nome']);
        $telefone = htmlspecialchars($_POST['telefone']);
        $email = htmlspecialchars($_POST['email']);
        $senha = htmlspecialchars($_POST['senha']);
        $confirmarSenha = htmlspecialchars($_POST['confSenha']); // Corrigido para confSenha

        // Verificar se está preenchido
        if (!empty($nome) && !empty($telefone) && !empty($email) && !empty($senha) && !empty($confirmarSenha)) {
            // Então será feito o envio
            $u->conectar("projeto_login", "localhost", "root", "");
            if ($u->msgErro == "") { // OK
                if ($senha == $confirmarSenha) {
                    if ($u->cadastrar($nome, $telefone, $email, $senha)) {
                        echo "Cadastrado com sucesso, acesse para entrar!";
                    } else {
                        echo "Email já cadastrado!";
                    }
                } else {
                    echo "Senha e confirmar senha não correspondem!";
                }
            } else {
                echo "Erro: " . $u->msgErro;
            }
        } else { 
            echo "Preencha todos os campos!";
        }
    }
    ?>
</body>
</html>
