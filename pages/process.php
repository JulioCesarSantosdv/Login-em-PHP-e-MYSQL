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
                    ?>
                    <div id="success-message">
                        Cadastrado com sucesso!<br>
                        <a href='login.php'>Clique aqui para fazer login</a>
                    </div>
                    <?php
                } else {
                    ?>
                    <div class="error-message">
                        Email já cadastrado!
                    </div>
                    <?php
                }
            } else {
                ?>
                <div class="error-message">
                    As senhas não coincidem!
                </div>
                <?php
            }
        } else {
            ?>
            <div class="error-message">
                <?php echo "Erro ao conectar ao banco de dados: " . $u->msgErro;?>
            </div>
            <?php
        }
    } else {
        ?>
        <div class="error-message">
            Preencha todos os campos!
        </div>
        <?php
    }
} else {
    ?>
    <div class="error-message">
        Método de solicitação inválido.
    </div>
    <?php
}
?>
