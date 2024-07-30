<?php
require_once './class/users.php';

$u = new User();
$msg = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = htmlspecialchars($_POST['email']);
    $senha = htmlspecialchars($_POST['senha']);

    if (!empty($email) && !empty($senha)) {
        $u->conectar("projeto_login", "localhost", "root", "");

        if ($u->msgErro === "") {
            if ($u->logar($email, $senha)) {
                header("Location: pages/AreaPrivada.php");
                exit;
            } else {
                $msg = "Email e/ou senha estão incorretos!";
            }
        } else {
            $msg = "Erro ao conectar ao banco de dados: " . $u->msgErro;
        }
    } else {
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
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <video autoplay muted loop id="bg-video">
        <source src="video/fundo3.mp4" type="video/mp4">
        Seu navegador não suporta a tag de vídeo.
    </video>
    <div id="form-body">
        <h1>Entrar</h1>
        <form method="POST" action="">
            <input type="email" name="email" placeholder="Usuário" maxlength="40">
            <input type="password" name="senha" placeholder="Senha" maxlength="15">
            <input type="submit" value="ACESSAR">
            <a href="pages/cadastrar.php">Ainda não é inscrito?<br><strong>Cadastre-se aqui!</strong></a>
        </form>
        <?php
        if (!empty($msg)) {
            echo '<div class="error-message" id="message">' . $msg . '</div>';
        }
        ?>
    </div>
    <script>
        setTimeout(function() {
            var message = document.getElementById('message');
            if (message) {
                message.style.display = 'none';
            }
        }, 2000);
    </script>
</body>
</html>
