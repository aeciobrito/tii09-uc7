USE venda;

-- CRIA A TABELA DE CLIENTES
CREATE TABLE IF NOT EXISTS clientes (
	id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    cpf VARCHAR(14) NOT NULL,
    ativo BOOLEAN NOT NULL DEFAULT 1,
    dataDeNascimento DATE NOT NULL
);

--- add dados fictícios para a tabela clientes

INSERT INTO clientes (nome, cpf, ativo, dataDeNascimento) VALUES
('Ana Paula da Silva', '123.456.789-00', 1, '1985-04-12'),
('Bruno Henrique Souza', '234.567.890-11', 1, '1990-09-30'),
('Carla Maria de Almeida', '345.678.901-22', 0, '1978-12-05'),
('Daniel Costa Ferreira', '456.789.012-33', 1, '2000-06-20'),
('Elisa Moura Tavares', '567.890.123-44', 1, '1995-03-15'),
('Felipe Rocha Lima', '678.901.234-55', 0, '1982-11-01'),
('Gabriela Ramos Pinto', '789.012.345-66', 1, '1999-01-25'),
('Henrique Lopes Dias', '890.123.456-77', 1, '1993-07-10'),
('Isabela Figueiredo Neves', '901.234.567-88', 1, '1988-02-28'),
('João Pedro Martins', '012.345.678-99', 1, '1975-05-07');
