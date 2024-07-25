<?php
require_once '../CLASS/users.php'; // Adicionado ponto e vírgula
$u = new User();
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
            <input type="email" placeholder="usuário" name="email" maxlength="40" required>
            <input type="password" placeholder="senha" name="senha" maxlength="15" required>
            <input type="submit" value="ACESSAR">
            <a href="pages/cadastrar.php">Se ainda não é inscrito<br><strong>Cadastre-se aqui!</strong></a>
        </form>
    </div>
    <?php
    if (isset($_POST['email'])) 
    {
        $email = htmlspecialchars($_POST['email']);
        $senha = htmlspecialchars($_POST['senha']);
        // Verificar se está preenchido
        if (!empty($email) && !empty($senha)) 
        {
            $u->conectar("projeto_login", "localhost", "root", "");
            if ($u->msgErro === "") 
            {
                if($u->logar($email, $senha)) 
                {
                    header("Location: AreaPrivada.php");
                } 
                else 
                {
                    echo "Email e/ou senha estão incorretos!";
                }
            } 
            else 
            {
                echo "Erro: ".$u->msgErro;
            }
        } 
        else 
        {
            echo "Preencha todos os campos!";
        }
    }
    ?>
</body>
</html>
