-- Cria o banco de dados chamado 'pizzaria_senac' caso ele ainda não exista
CREATE DATABASE IF NOT EXISTS pizzaria_senac;

-- Seleciona o banco de dados 'pizzaria_senac' para uso nas próximas operações
USE pizzaria_senac;

-- Cria a tabela 'pizza' caso ela ainda não exista
CREATE TABLE IF NOT EXISTS pizza (
    id INT AUTO_INCREMENT PRIMARY KEY,     -- Coluna 'id': número inteiro, auto incrementado e chave primária da tabela
    sabor VARCHAR(100) NOT NULL,           -- Coluna 'sabor': armazena o nome do sabor da pizza com até 100 caracteres, não permite valor nulo
    tamanho VARCHAR(10) NOT NULL,          -- Coluna 'tamanho': armazena o tamanho da pizza (ex: Pequena, Média, Grande), até 10 caracteres, não nulo
    preco DECIMAL(10, 2) NOT NULL          -- Coluna 'preco': armazena o valor da pizza com duas casas decimais (ex: 39.90), não nulo
);

-- Inserção de sabores reais de pizza:
INSERT INTO pizza (sabor, tamanho, preco) VALUES ('Pepperoni', 'Grande', 44.90);
INSERT INTO pizza (sabor, tamanho, preco) VALUES ('Vegetariana', 'Média', 36.50);
INSERT INTO pizza (sabor, tamanho, preco) VALUES ('Atum', 'Grande', 40.00);
INSERT INTO pizza (sabor, tamanho, preco) VALUES ('Bacon com Cheddar', 'Grande', 46.90);
INSERT INTO pizza (sabor, tamanho, preco) VALUES ('Carne Seca com Abóbora', 'Média', 41.00);
INSERT INTO pizza (sabor, tamanho, preco) VALUES ('Camarão', 'Grande', 55.00);
INSERT INTO pizza (sabor, tamanho, preco) VALUES ('Mexicana', 'Média', 38.00);
INSERT INTO pizza (sabor, tamanho, preco) VALUES ('Frango Barbecue', 'Grande', 45.00);
INSERT INTO pizza (sabor, tamanho, preco) VALUES ('Palmito', 'Pequena', 30.00);
INSERT INTO pizza (sabor, tamanho, preco) VALUES ('Lombo Canadense', 'Média', 37.90);
INSERT INTO pizza (sabor, tamanho, preco) VALUES ('Napolitana', 'Grande', 39.00);
INSERT INTO pizza (sabor, tamanho, preco) VALUES ('Brócolis com Bacon', 'Média', 35.50);
INSERT INTO pizza (sabor, tamanho, preco) VALUES ('Alho e Óleo', 'Pequena', 25.00);
INSERT INTO pizza (sabor, tamanho, preco) VALUES ('Cheddar com Calabresa', 'Grande', 42.90);
INSERT INTO pizza (sabor, tamanho, preco) VALUES ('Rúcula com Tomate Seco', 'Média', 39.50);
INSERT INTO pizza (sabor, tamanho, preco) VALUES ('Escarola com Bacon', 'Média', 36.00);
INSERT INTO pizza (sabor, tamanho, preco) VALUES ('Berinjela', 'Pequena', 28.50);
INSERT INTO pizza (sabor, tamanho, preco) VALUES ('Carbonara', 'Grande', 47.00);
INSERT INTO pizza (sabor, tamanho, preco) VALUES ('Calabresa com Catupiry', 'Média', 39.90);
INSERT INTO pizza (sabor, tamanho, preco) VALUES ('Frango com Milho', 'Pequena', 30.00);
INSERT INTO pizza (sabor, tamanho, preco) VALUES ('Tomate Seco com Manjericão', 'Média', 37.00);
INSERT INTO pizza (sabor, tamanho, preco) VALUES ('Costela BBQ', 'Grande', 50.00);
INSERT INTO pizza (sabor, tamanho, preco) VALUES ('Milho Verde com Catupiry', 'Média', 34.50);
INSERT INTO pizza (sabor, tamanho, preco) VALUES ('Abobrinha com Queijo', 'Pequena', 27.90);
INSERT INTO pizza (sabor, tamanho, preco) VALUES ('Lombo com Catupiry', 'Grande', 43.50);
INSERT INTO pizza (sabor, tamanho, preco) VALUES ('Tomate com Orégano', 'Pequena', 24.90);
INSERT INTO pizza (sabor, tamanho, preco) VALUES ('Quatro Estações', 'Grande', 46.00);
INSERT INTO pizza (sabor, tamanho, preco) VALUES ('Brie com Damasco', 'Média', 48.00);
INSERT INTO pizza (sabor, tamanho, preco) VALUES ('Alho Poró com Queijo', 'Pequena', 29.90);
INSERT INTO pizza (sabor, tamanho, preco) VALUES ('Chocolate com Morango', 'Média', 33.00);
INSERT INTO pizza (sabor, tamanho, preco) VALUES ('Banana com Canela', 'Pequena', 26.00);

