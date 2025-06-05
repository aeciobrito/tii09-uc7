<?php

class Usuario 
{
    private ?int $id; // Identificador único do usuário, pode ser nulo até ser definido.
    private string $nome; // Nome do usuário, obrigatório e do tipo string.
    private string $senha; // Senha do usuário, deve ser armazenada de forma segura (hash recomendado).
    private string $email; // Email do usuário, utilizado para autenticação e deve ser único.
    private string $tokem; // Provável campo para autenticação ou recuperação de senha, porém, o correto seria "token".

    public function __construct(?int $id, string $nome, string $senha, string $email, string $tokem = null) 
    {
        $this->id = $id; // Identificador único do usuário, pode ser nulo até ser definido
        $this->nome = $nome; // Nome do usuário, obrigatório e do tipo string
        $this->senha = $senha; // Senha do usuário, deve ser armazenada de forma segura (hash recomendado)
        $this->email = $email; // Email do usuário, utilizado para autenticação e deve ser único
        $this->tokem = $tokem; // Provável campo para autenticação ou recuperação de senha, mas o correto seria "token"
    }

    

    // Getters e Setters







}

$senha = $_GET['senha']; // Obtém a senha da requisição via URL (Método GET) – não seguro!
// http://localhost/minoru/tii09-uc7/10/Usuario.php?senha=abc123
echo 'Senha: ' . $senha . '<br>'. '<br>'; // Exibe a senha obtida da URL

$senha_cripto = password_hash($senha, PASSWORD_DEFAULT); // Criptografa a senha usando o algoritmo padrão do PHP    
echo 'Senha Criptografada: ' . $senha_cripto . '<br>'. '<br>';

$tokem = bin2hex(random_bytes(25)); // Gera um token aleatório de 50 caracteres hexadecimais
echo 'Tokem: ' . $tokem . '<br>'. '<br>'; // Exibe o token gerado