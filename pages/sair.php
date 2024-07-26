<?php
// Inicia uma nova sessão ou retoma uma sessão existente
session_start();

// Remove a variável de sessão 'id_user', efetivamente desconectando o usuário
unset($_SESSION['id_user']);

// Redireciona o usuário para a página inicial
header("Location: ../index.php");
?>
