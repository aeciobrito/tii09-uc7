<?php

class Usuario
{
    private ?int $id;
    private string $nome;
    private string $senha;
    private string $email;
    private ?string $token;

    public function __construct(?int $id, string $nome, string $senha, string $email, ?string $token = null) 
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->senha = $senha;
        $this->email = $email;
        $this->token = $token;
    }

    public function getId(): ?int { return $this->id; }
    public function getNome(): string { return $this->nome; }
    public function getSenha(): string { return $this->senha; }
    public function getEmail(): string { return $this->email; }
    public function getToken(): ?string { return $this->token; }
}


// $senha = $_GET['senha']; // Obtém a senha da requisição via URL (Método GET) – não seguro!
// // http://localhost/minoru/tii09-uc7/10/Usuario.php?senha=abc123
// echo 'Senha: ' . $senha . '<br>'. '<br>'; // Exibe a senha obtida da URL

// $senha_cripto = password_hash($senha, PASSWORD_DEFAULT); // Criptografa a senha usando o algoritmo padrão do PHP    
// echo 'Senha Criptografada: ' . $senha_cripto . '<br>'. '<br>';

// $tokem = bin2hex(random_bytes(25)); // Gera um token aleatório de 50 caracteres hexadecimais
// echo 'Tokem: ' . $tokem . '<br>'. '<br>'; // Exibe o token gerado