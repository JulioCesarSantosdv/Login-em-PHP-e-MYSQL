<?php
class User
{
    // Objeto PDO para conectar ao banco de dados
    private $pdo;
    
    // Mensagem de erro, se ocorrer algum problema
    public $msgErro = ""; 

    /**
     * Conecta ao banco de dados com as credenciais fornecidas.
     *
     * @param string $nome Nome do banco de dados
     * @param string $host Endereço do servidor de banco de dados
     * @param string $usuario Nome de usuário para autenticação
     * @param string $senha Senha para autenticação
     */
    public function conectar($nome, $host, $usuario, $senha)
    {
        // Utiliza o objeto PDO para conectar ao banco de dados
        global $pdo;
        try {
            $pdo = new PDO("mysql:dbname=".$nome.";host=".$host, $usuario, $senha);
        } catch (PDOException $e) {
            // Define a mensagem de erro caso a conexão falhe
            $this->msgErro = $e->getMessage();
        }
    }

    /**
     * Cadastra um novo usuário no banco de dados.
     *
     * @param string $nome Nome do usuário
     * @param string $telefone Telefone do usuário
     * @param string $email Email do usuário
     * @param string $senha Senha do usuário
     * @return bool Retorna true se o cadastro for bem-sucedido, false se o email já estiver cadastrado
     */
    public function cadastrar($nome, $telefone, $email, $senha)
    {
        global $pdo;
        
        // Verifica se o email já está cadastrado
        $sql = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE email = :e");
        $sql->bindValue(":e", $email);
        $sql->execute();
        
        // Se o email já estiver cadastrado, retorna false
        if ($sql->rowCount() > 0) {
            return false;
        } else {
            // Se não estiver cadastrado, insere o novo usuário no banco de dados
            $sql = $pdo->prepare("INSERT INTO usuarios(nome, telefone, email, senha) VALUES(:n, :t, :e, :s)");
            $sql->bindValue(":n", $nome);
            $sql->bindValue(":t", $telefone);
            $sql->bindValue(":e", $email);
            $sql->bindValue(":s", md5($senha)); // Senha criptografada com MD5 (considerar uma criptografia mais segura)
            $sql->execute();
            return true;
        }
    }

    /**
     * Faz o login de um usuário com o email e senha fornecidos.
     *
     * @param string $email Email do usuário
     * @param string $senha Senha do usuário
     * @return bool Retorna true se o login for bem-sucedido, false caso contrário
     */
    public function logar($email, $senha)
    {
        global $pdo;
        
        // Verifica se o email e senha estão corretos
        $sql = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE email = :e AND senha = :s");
        $sql->bindValue(":e", $email);
        $sql->bindValue(":s", md5($senha)); // Senha criptografada com MD5 (considerar uma criptografia mais segura)
        $sql->execute();
        
        // Se a combinação email e senha estiver correta, inicia a sessão e retorna true
        if ($sql->rowCount() > 0) {
            $dado = $sql->fetch();
            session_start(); // Inicia a sessão
            $_SESSION['id_usuario'] = $dado['id_usuario']; // Armazena o ID do usuário na sessão
            return true;
        } else {
            // Caso contrário, retorna false
            return false;
        }
    }
}
?>
