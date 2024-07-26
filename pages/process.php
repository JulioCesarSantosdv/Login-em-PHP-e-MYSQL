<?php
// Inclui a classe User
require_once '../CLASS/users.php'; 

// Cria uma nova instância da classe User
$u = new User();

// Verifica se a requisição é do tipo POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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
        
        // Verifica se houve erro na conexão
        if ($u->msgErro === "") {
            // Verifica se as senhas coincidem
            if ($senha === $confirmarSenha) {
                // Tenta cadastrar o usuário
                if ($u->cadastrar($nome, $telefone, $email, $senha)) {
                    // Mensagem de sucesso
                    ?>
                    <div id="success-message">
                        Cadastrado com sucesso!<br>
                        <a href='login.php'>Clique aqui para fazer login</a>
                    </div>
                    <?php
                } else {
                    // Mensagem de erro para email já cadastrado
                    ?>
                    <div class="error-message">
                        Email já cadastrado!
                    </div>
                    <?php
                }
            } else {
                // Mensagem de erro para senhas não coincidentes
                ?>
                <div class="error-message">
                    As senhas não coincidem!
                </div>
                <?php
            }
        } else {
            // Mensagem de erro na conexão com o banco de dados
            ?>
            <div class="error-message">
                <?php echo "Erro ao conectar ao banco de dados: " . $u->msgErro;?>
            </div>
            <?php
        }
    } else {
        // Mensagem de erro para campos não preenchidos
        ?>
        <div class="error-message">
            Preencha todos os campos!
        </div>
        <?php
    }
} else {
    // Mensagem de erro para método de solicitação inválido
    ?>
    <div class="error-message">
        Método de solicitação inválido.
    </div>
    <?php
}
?>
