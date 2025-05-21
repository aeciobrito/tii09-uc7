DROP TABLE IF EXISTS contatos;

CREATE TABLE contatos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    telefone VARCHAR(15) NOT NULL,
    email VARCHAR(100) NOT NULL,
    endereco VARCHAR(255) DEFAULT NULL
);

INSERT INTO contatos (nome, telefone, email, endereco) VALUES 
    ('Mickey', '11999887766', 'mickey@mail.com', 'Rua X, Disney'),
    ('Donald', '11988881155', 'donald@mail.com', 'Ladeira Z, Disney'),
    ('Margarida', '11955887711', 'margarida@mail.com', 'Avenida Y, Disney');

INSERT INTO contatos (nome, telefone, email, endereco) VALUES 
    ('Batman', '11955557766', 'batman@mail.com', NULL);

INSERT INTO contatos (nome, telefone, email) VALUES 
    ('Superman', '11933553366', 'superman@mail.com');

// Se não quiser apagar a tabela, você pode verificar se a coluna existe com:
DESCRIBE contatos;

// Se o campo telefone não estiver listado, você pode adicioná-lo com:
ALTER TABLE contatos ADD telefone VARCHAR(15) NOT NULL AFTER nome;

INSERT INTO contatos (nome, telefone, email, endereco) VALUES 
    
    ('Pateta', '11944778899', 'pateta@mail.com', 'Travessa W, Disney'),
    ('Tio Patinhas', '11966778899', 'tio.patinhas@mail.com', 'Rua Ouro, Disney'),
    ('Pluto', '11933779988', 'pluto@mail.com', 'Vila dos Cachorros, Disney'),
    ('Minnie', '11998776655', 'minnie@mail.com', 'Avenida Moda, Disney'),
    ('Zé Carioca', '11966554433', 'ze.carioca@mail.com', 'Rua Samba, Brasil'),
    ('Daisy', '11988992211', 'daisy@mail.com', 'Rua Flores, Disney'),
    ('Oswaldo', '11922334455', 'oswaldo@mail.com', 'Rua Animação, Brasil'),
    ('Clarabela', '11977778899', 'clarabela@mail.com', 'Estrada Vaca, Disney'),
    ('José', '11911223344', 'jose@mail.com', 'Beco da Alegria, Brasil'),
    ('Horácio', '11999996655', 'horacio@mail.com', 'Travessa Dinossauro, Disney');
