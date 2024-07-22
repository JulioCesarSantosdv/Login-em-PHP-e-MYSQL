<!DOCTYPE html>
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
            <input type="password" name="senha"  placeholder="Senha" maxlength="15">
            <input type="password"name="confSenha"  placeholder="Confirmar Senha" maxlength="15">
            <input type="submit" value="CADASTRAR">
        </form>
    </div>
    <?php
    
    ?>
</body>
</html>