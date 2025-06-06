<?php
require_once 'Database.php';
require_once 'Usuario.php';

class UsuarioDAO
{
    private $db;
    
    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function create(Usuario $usuario)
    {
        $sql = "INSERT INTO usuario (nome, senha, email, token) 
        VALUES (:nome, :senha, :email, :token)";
        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            ':nome' => $usuario->getNome(),
            ':senha' => $usuario->getSenha(),
            ':senha' => password_hash($usuario->getSenha(), PASSWORD_DEFAULT),
            ':email' => $usuario->getEmail(),
            ':token' => $usuario->getToken()
        ]);

    }

    public function getByEmail(string $email): ?Usuario
    {
        // $sql = "SELECT * FROM usuario WHERE email = :email";
        $stmt = $this->db->prepare($sql = "SELECT * FROM usuario WHERE email = :email");
        $stmt->execute([':email' => $email]);
        $data = $stmt->fetch();

        return ($data) ?
         new Usuario($data['id'], $data['nome'], $data['senha'], $data['email'], $data['token']) : null;
    }
        
}

// $dao = new UsuarioDAO();
// $usr = new Usuario(null, 'aecio', '123456','aecio@gmail.com', null);