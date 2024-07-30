<?php
require_once './CLASS/users.php'; // Inclui a classe User para manipulação de usuários

$u = new User(); // Cria uma nova instância da classe User

$msg = ""; // Variável para armazenar mensagens de erro ou feedback

// Verifica se o formulário foi enviado via método POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtém e sanitiza os dados do formulário
    $email = htmlspecialchars($_POST['email']);
    $senha = htmlspecialchars($_POST['senha']);

    // Verifica se todos os campos foram preenchidos
    if (!empty($email) && !empty($senha)) {
        // Conecta ao banco de dados
        $u->conectar("projeto_login", "localhost", "root", "");

        // Verifica se não houve erro na conexão
        if ($u->msgErro === "") {
            // Tenta realizar o login com o email e senha fornecidos
            if ($u->logar($email, $senha)) {
                // Se o login for bem-sucedido, redireciona para a área privada
                header("Location: pages/AreaPrivada.php");
                exit; // Encerra a execução do script após o redirecionamento
            } else {
                // Se o login falhar, define a mensagem de erro
                $msg = "Email e/ou senha estão incorretos!";
            }
        } else {
            // Se houver um erro na conexão, define a mensagem de erro
            $msg = "Erro ao conectar ao banco de dados: " . $u->msgErro;
        }
    } else {
        // Se algum campo estiver vazio, define a mensagem de erro
        $msg = "Preencha todos os campos!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projeto Login</title>
    <link rel="stylesheet" href="css/style.css"> <!-- Link para o arquivo CSS -->
</head>
<body>
    <video autoplay muted loop id="bg-video"> <!-- Vídeo de fundo com propriedades de reprodução -->
        <source src="video/fundo3.mp4" type="video/mp4">
        Seu navegador não suporta a tag de vídeo.
    </video>
    <div id="form-body"> <!-- Container para o formulário de login -->
        <h1>Entrar</h1> <!-- Título do formulário -->
        <form method="POST" action="pages/process.php"> <!-- Formulário de login -->
            <input type="email" placeholder="usuário" name="email" maxlength="40" required> <!-- Campo para o email -->
            <input type="password" placeholder="senha" name="senha" maxlength="15" required> <!-- Campo para a senha -->
            <input type="submit" value="ACESSAR"> <!-- Botão de envio do formulário -->
            <a href="pages/cadastrar.php">Se ainda não é inscrito<br><strong>Cadastre-se aqui!</strong></a> <!-- Link para a página de cadastro -->
        </form>
        <!-- Exibe a mensagem de erro, se houver -->
        <?php if (!empty($msg)): ?>
            <div class="error-message" id="message">
                <?php echo $msg; ?>
            </div>
        <?php endif; ?>
    </div>
    <script>
        // Esconde a mensagem de erro após 2 segundos (2000 ms)
        setTimeout(function() {
            var message = document.getElementById('message');
            if (message) {
                message.style.display = 'none'; // Remove a mensagem de erro da tela
            }
        }, 2000);
    </script>
</body>
</html>
