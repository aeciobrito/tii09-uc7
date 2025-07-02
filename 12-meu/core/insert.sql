USE venda;

INSERT INTO produtos (nome, preco, ativo, dataDeCadastro, dataDeValidade) VALUES
('Notebook Gamer X', 7500.00, TRUE, '2023-01-15', NULL),
('Monitor UltraWide 34"', 1899.99, TRUE, '2023-02-20', NULL),
('Teclado Mecânico RGB', 450.50, TRUE, '2023-03-01', NULL),
('Mouse Sem Fio Ergonômico', 120.00, TRUE, '2023-03-05', NULL),
('Webcam Full HD', 280.00, TRUE, '2023-04-10', NULL),
('Fone de Ouvido Bluetooth', 320.00, TRUE, '2023-04-15', NULL),
('SSD NVMe 1TB', 600.00, TRUE, '2023-05-01', NULL),
('Placa de Vídeo RTX 4070', 4999.00, TRUE, '2023-05-10', NULL),
('Processador Intel i7 13ª Gen', 2500.00, TRUE, '2023-06-01', NULL),
('Memória RAM DDR5 16GB', 550.00, TRUE, '2023-06-05', NULL),
('Roteador Wi-Fi 6', 399.99, TRUE, '2023-07-01', NULL),
('Cadeira Gamer Ergonômica', 950.00, TRUE, '2023-07-10', NULL),
('Impressora Multifuncional', 780.00, TRUE, '2023-08-01', NULL),
('Antivírus Anual', 150.00, TRUE, '2023-08-05', '2024-08-05'),
('Software de Edição de Vídeo', 1200.00, TRUE, '2023-09-01', '2025-09-01'),
('Pen Drive 64GB', 45.00, TRUE, '2023-09-10', NULL),
('Bateria Externa 20000mAh', 85.00, TRUE, '2023-10-01', NULL),
('Smartwatch Fitness', 650.00, TRUE, '2023-10-05', NULL),
('Câmera Digital Compacta', 1500.00, TRUE, '2023-11-01', NULL),
('Caixa de Som Portátil', 180.00, TRUE, '2023-11-05', NULL),
('Filtro de Linha Bivolt', 60.00, TRUE, '2023-12-01', NULL),
('HD Externo 2TB', 300.00, TRUE, '2023-12-05', NULL),
('Adaptador USB-C para HDMI', 70.00, TRUE, '2024-01-01', NULL),
('Cabo de Rede Cat6 10m', 35.00, TRUE, '2024-01-05', NULL),
('Mesa Digitalizadora', 400.00, TRUE, '2024-02-01', NULL),
('Kit Limpeza de Telas', 25.00, TRUE, '2024-02-05', NULL),
('Carregador Rápido USB-C', 90.00, TRUE, '2024-03-01', NULL),
('Mouse Pad Grande', 50.00, TRUE, '2024-03-05', NULL),
('Projetor Portátil', 2100.00, TRUE, '2024-04-01', NULL),
('Headset Gamer c/ Microfone', 280.00, TRUE, '2024-04-05', NULL),
('Produto Antigo (Inativo)', 10.00, FALSE, '2022-01-01', '2023-01-01'),
('Estoque Esgotado (Inativo)', 50.00, FALSE, '2023-02-10', NULL),
('Item Descontinuado (Inativo)', 20.00, FALSE, '2023-03-15', NULL),
('Produto Vencido (Inativo)', 5.00, FALSE, '2023-04-20', '2024-01-01');

-- use venda12;
USE venda12;

INSERT INTO fornecedores (nome, cnpj, contato)
VALUES
  ('Comercial São Pedro LTDA', '12.345.678/0001-99', 'sao.pedro@exemplo.com'),
  ('Distribuidora Real', '98.765.432/0001-55', 'contato@real.com.br'),
  ('Indústria Nova Era', '11.222.333/0001-77', 'novaera@empresa.com'),
  ('Fornecedora Central', '22.333.444/0001-88', 'central@fornece.com'),
  ('Mega Indústria Brasil', '33.444.555/0001-22', 'mega@industria.com.br'),
  ('Global Parts Ltda', '44.555.666/0001-11', 'atendimento@globalparts.com'),
  ('Alimentos & Cia', '55.666.777/0001-00', 'alimentos@eecia.com'),
  ('Tech Suprimentos ME', '66.777.888/0001-44', 'tech@suprimentos.com'),
  ('Serviços Gerais União', '77.888.999/0001-33', 'uniao@servicos.com'),
  ('Materiais Forte Ltda', '88.999.000/0001-66', 'materiais@forte.com.br');


SELECT * FROM produtos;

USE venda12;
INSERT INTO produtos (nome, preco, ativo, dataDeCadastro, dataDeValidade, fornecedor_id)
VALUES ('Monitor 27" 4K', 0, TRUE, '2024-05-01', '2025-05-01', 1);
update produtos set fornecedores_id = 1  where id = 1;

USE venda12;
SELECT * FROM produtos; wherev id = 5;

USE venda12;
SELECT * FROM PRODUTOS
LEFT JOIN fornecedores ON produtos. fornecedor_id = fornecedores.id
where produtos.id = 5;

-- SELECT * FROM PRODUTOS;
-- SELECT p. * , fornecedor_id, forn FROM produtos p
-- LEFT JOIN fornecedores f
-- ON p.fornecedor_id = f.id;

SELECT * FROM PRODUTOS;

SELECT p.* ,
f.id AS fornecedor_id,
f.nome AS fornecedor_nome
FROM produtos p
LEFT JOIN fornecedores f
ON p.fornecedor_id = f.id;
