-- CRIA O BANCO DE DADOS SE ELE NÃO EXISTIR
CREATE DATABASE IF NOT EXISTS venda;

-- SELECIONA O BANCO DE DADOS "venda" PARA USO
USE venda;

-- CRIA A TABELA "produtos" SE ELA NÃO EXISTIR
CREATE TABLE IF NOT EXISTS produtos (
    id INT AUTO_INCREMENT PRIMARY KEY,  -- Identificador único, gerado automaticamente
    nome VARCHAR(100) NOT NULL,        -- Nome do produto, até 100 caracteres, obrigatório
    preco DECIMAL(10, 2) NOT NULL,     -- Preço do produto com duas casas decimais, obrigatório
    ativo BOOLEAN NOT NULL DEFAULT 1,  -- Define se o produto está ativo (1 = ativo, 0 = inativo), padrão ativo
    dataDeCadastro DATE NOT NULL,      -- Data de cadastro do produto, obrigatória
    dataDeValidade DATE                -- Data de validade do produto, opcional (pode ser NULL)
);

-- INSERT
USE venda;
INSERT INTO produtos (nome, preco, ativo, dataDeCadastro, dataDeValidade) -- Insere um novo registro na tabela "produtos"
VALUES 
('Teste1', 0, 0, '2025-01-01','2025-12-12'); -- Define os valores para os campos: nome, preco, ativo, dataDeCadastro, dataDeValidade

-- Esse trecho de código contém um comando perigoso que pode excluir a tabela produtos do banco de dados. Vamos analisar isso:
'Teste1', 0, 0, '2025-01-01','2025-12-12'); DROP TABLE produtos --

-- extrair dados em vez de deletá-los, então o comando
SELECT * FROM produtos; -- Obtém todos os registros da tabela "produtos"
