<?php
// Inicia uma nova sessão ou resume uma sessão existente
session_start();

// Verifica se o usuário está logado verificando a existência da variável de sessão 'id_usuario'
if (!isset($_SESSION['id_usuario'])) {
    // Se o usuário não estiver logado, redireciona para a página de login
    header("Location: index.php");
    exit; // Encerra o script após o redirecionamento para garantir que o restante do código não seja executado
}
?>

<!-- Exibe uma mensagem de boas-vindas ao usuário logado -->
<h1>SEJA BEM VINDO!</h1>

<!-- Link para sair da sessão -->
<a href="sair.php">SAIR</a>
