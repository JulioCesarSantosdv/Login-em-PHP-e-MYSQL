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
        <form method="POST" action="process.php">
            <input type="email" placeholder="usuário" name="email" maxlength="40">
            <input type="password" placeholder="senha" name="senha" maxlength="15">
            <input type="submit" value="ACESSAR">
            <a href="pages/cadastrar.php">Se ainda não é inscrito<br><strong>Cadastre-se aqui!</strong></a>
        </form>
    </div>
</body>
</html>



