# Sistema de Login para WEB com PHP e MySQL

Este é um projeto simples de sistema de login para a web utilizando PHP e MySQL. O projeto inclui um formulário de login, um formulário de cadastro e a integração com um banco de dados MySQL para armazenamento dos dados dos usuários.

## Estrutura do Projeto

- `index.php`: Página principal com o formulário de login.
- `cadastrar.php`: Página de cadastro de novos usuários.
- `process.php`: Script PHP para processar login e cadastro de usuários.
- `users.php`: Classe PHP para lidar com a conexão ao banco de dados e operações de login e cadastro.
- `css/style.css`: Arquivo CSS para estilização das páginas.
- `video/fundo3.mp4` e `video/fundo6.mp4`: Vídeos de fundo para as páginas.
- Crédito dos vídeos ( https://pixabay.com/)
  ## Tecnologias Utilizadas

| Tecnologia          | Versão                               |
|---------------------|--------------------------------------|
| XAMPP               | 8.0.30-0                             |
| PHP                 | 8.1                                  |
| PHP MySQL           |8.3.6                                 |
| JavaScript          | ECMAScript 5.1.                      |
| CSS                 | CSS 3                                |
| HTML                | 5                                    |
## Configuração do Banco de Dados

Crie um banco de dados MySQL e uma tabela `usuarios` com a seguinte estrutura:

```sql
CREATE DATABASE projeto_login;

USE projeto_login;

CREATE TABLE usuarios (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(30),
    telefone VARCHAR(30),
    email VARCHAR(40),
    senha VARCHAR(32)
);
