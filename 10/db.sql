CREATE TABLE IF NOT EXISTS usuario (
    id INT AUTO_INCREMENT PRIMARY KEY, -- Identificador único e crescente para cada usuário
    nome VARCHAR(50) NOT NULL, -- Nome do usuário, obrigatório e com limite de 50 caracteres
    senha VARCHAR(255) NOT NULL, -- Senha do usuário (deve ser armazenada de forma segura, com hash)
    email VARCHAR(100) NOT NULL UNIQUE, -- Email do usuário, obrigatório e único no banco de dados
    token VARCHAR(255) DEFAULT NULL -- Campo opcional para armazenar tokens de autenticação ou recuperação
);
