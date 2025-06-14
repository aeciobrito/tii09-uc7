


---------------------------------------------
-- DROP DATABASE venda;

-- CRIA O BANCO DE DADOS SE ELE NÃO EXISTIR
CREATE DATABASE IF NOT EXISTS venda;
-- Seleciona o banco de dados "venda" para uso
-- Certifique-se de que este banco de dados já existe ou crie-o antes de executar este script.
-- Ex: CREATE DATABASE IF NOT EXISTS venda;

USE venda;

-- Cria a tabela usuarios
CREATE TABLE IF NOT EXISTS usuario(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50) NOT NULL,
    senha VARCHAR(255) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    token VARCHAR(255) DEFAULT NULL
);

-- Cria a tabela "produtos" se ela não existir
CREATE TABLE IF NOT EXISTS produtos (
    id INT AUTO_INCREMENT PRIMARY KEY,          -- Identificador único, gerado automaticamente
    nome VARCHAR(100) NOT NULL,                 -- Nome do produto, até 100 caracteres, obrigatório
    preco DECIMAL(10, 2) NOT NULL,              -- Preço do produto com duas casas decimais, obrigatório
    ativo BOOLEAN NOT NULL DEFAULT 1,           -- Define se o produto está ativo (1 = ativo, 0 = inativo), padrão ativo
    dataDeCadastro DATE NOT NULL,               -- Data de cadastro do produto, obrigatória
    dataDeValidade DATE                         -- Data de validade do produto, opcional (pode ser NULL)
);

-- Cria a tabela "clientes" se ela não existir
CREATE TABLE IF NOT EXISTS clientes (
    id INT AUTO_INCREMENT PRIMARY KEY,          -- Identificador único, gerado automaticamente
    nome VARCHAR(255) NOT NULL,                 -- Nome completo do cliente, obrigatório
    email VARCHAR(255) UNIQUE NOT NULL,         -- E-mail do cliente, único e obrigatório
    telefone VARCHAR(20),                       -- Telefone do cliente, opcional
    dataDeCadastro DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP -- Data e hora de cadastro do cliente, padrão a data e hora atual
);

-- Cria a tabela "pedidos" se ela não existir
CREATE TABLE IF NOT EXISTS pedidos (
    id INT AUTO_INCREMENT PRIMARY KEY,          -- Identificador único do pedido
    cliente_id INT NOT NULL,                    -- Chave estrangeira para a tabela clientes
    dataPedido DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP, -- Data e hora do pedido
    valorTotal DECIMAL(10, 2) NOT NULL,         -- Valor total do pedido
    status ENUM('pendente', 'processando', 'concluido', 'cancelado') NOT NULL DEFAULT 'pendente', -- Status do pedido
    FOREIGN KEY (cliente_id) REFERENCES clientes(id) ON DELETE CASCADE -- Define cliente_id como chave estrangeira
);

-- Cria a tabela "itens_pedido" se ela não existir
-- Esta tabela armazena os produtos dentro de cada pedido
CREATE TABLE IF NOT EXISTS itens_pedido (
    id INT AUTO_INCREMENT PRIMARY KEY,          -- Identificador único do item do pedido
    pedido_id INT NOT NULL,                     -- Chave estrangeira para a tabela pedidos
    produto_id INT NOT NULL,                    -- Chave estrangeira para a tabela produtos
    quantidade INT NOT NULL,                    -- Quantidade do produto no pedido
    precoUnitario DECIMAL(10, 2) NOT NULL,      -- Preço unitário do produto no momento da compra
    FOREIGN KEY (pedido_id) REFERENCES pedidos(id) ON DELETE CASCADE, -- Define pedido_id como chave estrangeira
    FOREIGN KEY (produto_id) REFERENCES produtos(id) ON DELETE RESTRICT -- Define produto_id como chave estrangeira
);

-- Inserção de dados de exemplo (opcional)
-- Produtos
INSERT INTO produtos (nome, preco, ativo, dataDeCadastro, dataDeValidade) VALUES
('Smartphone XYZ', 1500.00, 1, '2024-01-15', '2026-01-15'),
('Notebook ABC', 3200.50, 1, '2024-02-20', NULL),
('Fone de Ouvido Bluetooth', 150.00, 1, '2024-03-01', NULL),
('Mouse Sem Fio', 75.90, 0, '2024-03-05', NULL);

-- Clientes
INSERT INTO clientes (nome, email, telefone) VALUES
('João Silva', 'joao.silva@email.com', '11987654321'),
('Maria Oliveira', 'maria.o@email.com', '21998765432'),
('Carlos Souza', 'carlos.s@email.com', NULL);

-- Pedidos
INSERT INTO pedidos (cliente_id, valorTotal, status) VALUES
(1, 1650.00, 'concluido'), -- Pedido do João
(2, 3200.50, 'pendente');  -- Pedido da Maria

-- Itens do Pedido
INSERT INTO itens_pedido (pedido_id, produto_id, quantidade, precoUnitario) VALUES
(1, 1, 1, 1500.00), -- Smartphone para o Pedido 1
(1, 3, 1, 150.00),  -- Fone para o Pedido 1
(2, 2, 1, 3200.50); -- Notebook para o Pedido 2

-- Inserção de dados para a tabela 'usuario'

-- Usuário 1: admin@exemplo.com
-- Senha original: senha123
-- O hash da senha deve ser gerado pelo PHP (ex: password_hash('senha123', PASSWORD_DEFAULT))
INSERT INTO usuario (nome, senha, email, token) VALUES
('Administrador', '123456', 'admin@exemplo.com', NULL);

-- Usuário 2: maria@exemplo.com
-- Senha original: senha456
INSERT INTO usuario (nome, senha, email, token) VALUES
('Maria Silva', '123456', 'maria@exemplo.com', NULL);

-- Usuário 3: joao@exemplo.com
-- Senha original: minhasenha
INSERT INTO usuario (nome, senha, email, token) VALUES
('João Souza', '123456', 'joao@exemplo.com', NULL);

USE venda;
SELECT * FROM usuario;


-- INSERT produtos
USE venda;
INSERT INTO produtos (nome, preco, ativo, dataDeCadastro, dataDeValidade) -- Insere um novo registro na tabela "produtos"
VALUES 
('Teste1', 0, 0, '2025-01-01','2025-12-12'); -- Define os valores para os campos: nome, preco, ativo, dataDeCadastro, dataDeValidade

USE venda;
SELECT * FROM produtos; -- Obtém todos os registros da tabela "produtos"


----------------------------------------  BANCO 02

-- DROP DATABASE venda; -- Comando para dropar o banco, descomente se for recriar do zero

-- CRIA O BANCO DE DADOS SE ELE NÃO EXISTIR
CREATE DATABASE IF NOT EXISTS venda;

-- Seleciona o banco de dados "venda" para uso
USE venda;

-- Cria a tabela 'usuario'
CREATE TABLE IF NOT EXISTS usuario(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50) NOT NULL,
    senha VARCHAR(255) NOT NULL, -- Recomenda-se usar um hash mais forte aqui, como PASSWORD_HASH em PHP
    email VARCHAR(100) UNIQUE NOT NULL,
    token VARCHAR(255) DEFAULT NULL
);

-- Cria a tabela 'produtos'
CREATE TABLE IF NOT EXISTS produtos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    preco DECIMAL(10, 2) NOT NULL,
    ativo BOOLEAN NOT NULL DEFAULT 1,
    dataDeCadastro DATE NOT NULL,
    dataDeValidade DATE -- Pode ser NULL
);

-- Cria a tabela 'clientes'
CREATE TABLE IF NOT EXISTS clientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    telefone VARCHAR(20),
    dataDeCadastro DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);

-- Cria a tabela 'pedidos'
CREATE TABLE IF NOT EXISTS pedidos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cliente_id INT NOT NULL,
    dataPedido DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    valorTotal DECIMAL(10, 2) NOT NULL,
    status ENUM('pendente', 'processando', 'concluido', 'cancelado') NOT NULL DEFAULT 'pendente',
    -- Quando um cliente é excluído, seus pedidos também são (ON DELETE CASCADE)
    FOREIGN KEY (cliente_id) REFERENCES clientes(id) ON DELETE CASCADE
);

-- Cria a tabela 'itens_pedido'
-- Esta tabela armazena os produtos dentro de cada pedido
CREATE TABLE IF NOT EXISTS itens_pedido (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pedido_id INT NOT NULL,
    produto_id INT NULL,
    quantidade INT NOT NULL,
    precoUnitario DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (pedido_id) REFERENCES pedidos(id) ON DELETE CASCADE,
    FOREIGN KEY (produto_id) REFERENCES produtos(id) ON DELETE SET NULL
);

-- Inserção de dados de exemplo (opcional)

-- Usuários
INSERT INTO usuario (nome, senha, email, token) VALUES
('Administrador', '123456', 'admin@exemplo.com', NULL),
('Maria Silva', '123456', 'maria@exemplo.com', NULL),
('João Souza', '123456', 'joao@exemplo.com', NULL);

-- Produtos
INSERT INTO produtos (nome, preco, ativo, dataDeCadastro, dataDeValidade) VALUES
('Smartphone XYZ', 1500.00, 1, '2024-01-15', '2026-01-15'),
('Notebook ABC', 3200.50, 1, '2024-02-20', NULL),
('Fone de Ouvido Bluetooth', 150.00, 1, '2024-03-01', NULL),
('Mouse Sem Fio', 75.90, 0, '2024-03-05', NULL);

-- Clientes
INSERT INTO clientes (nome, email, telefone) VALUES
('João Silva', 'joao.silva@email.com', '11987654321'),
('Maria Oliveira', 'maria.o@email.com', '21998765432'),
('Carlos Souza', 'carlos.s@email.com', NULL);

-- Pedidos
INSERT INTO pedidos (cliente_id, valorTotal, status) VALUES
(1, 1650.00, 'concluido'),
(2, 3200.50, 'pendente');

-- Itens do Pedido
INSERT INTO itens_pedido (pedido_id, produto_id, quantidade, precoUnitario) VALUES
(1, 1, 1, 1500.00), -- Smartphone para o Pedido 1
(1, 3, 1, 150.00),  -- Fone para o Pedido 1
(2, 2, 1, 3200.50); -- Notebook para o Pedido 2

-- Consultas de exemplo
USE venda;
SELECT * FROM usuario;

USE venda;
SELECT * FROM produtos;