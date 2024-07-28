<!DOCTYPE html>
<?php
// Inclui a classe User
require_once '../CLASS/users.php'; 
// Cria uma nova instância da classe User
$u = new User(); 
?>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projeto Login</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <!-- Vídeo de fundo -->
    <video autoplay muted loop id="bg-video">
        <source src="../video/fundo6.mp4" type="video/mp4">
        Seu navegador não suporta a tag de vídeo.
    </video>
    <!-- Formulário de cadastro -->
    <div id="form-body-cad">
        <h1>Cadastrar</h1>
        <form method="POST" action="process.php">
            <input type="text" name="nome" placeholder="Nome Completo" maxlength="30">
            <input type="text" name="telefone" placeholder="Telefone" maxlength="30">
            <input type="email" name="email" placeholder="Usuário" maxlength="40">
            <input type="password" name="senha" placeholder="Senha" maxlength="15">
            <input type="password" name="confSenha" placeholder="Confirmar Senha" maxlength="15">
            <input type="submit" value="CADASTRAR">
        </form>
    </div>
    <?php
    // Verifica se o formulário foi enviado
    if (isset($_POST['nome'])) {
        // Sanitiza os inputs do usuário
        $nome = htmlspecialchars($_POST['nome']);
        $telefone = htmlspecialchars($_POST['telefone']);
        $email = htmlspecialchars($_POST['email']);
        $senha = htmlspecialchars($_POST['senha']);
        $confirmarSenha = htmlspecialchars($_POST['confSenha']);

        // Verifica se todos os campos estão preenchidos
        if (!empty($nome) && !empty($telefone) && !empty($email) && !empty($senha) && !empty($confirmarSenha)) {
            // Conecta ao banco de dados
            $u->conectar("projeto_login", "localhost", "root", "");
            if ($u->msgErro == "") { // Sem erro na conexão
                // Verifica se as senhas coincidem
                if ($senha == $confirmarSenha) {
                    // Tenta cadastrar o usuário
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
    <script>
            // Esconde a mensagem após 2 segundos
        setTimeout(function() {
            var message = document.getElementById('message');
            if (message) {
                message.style.display = 'none';
            }
        }, 2000);
    </script>
</body>
</html>
