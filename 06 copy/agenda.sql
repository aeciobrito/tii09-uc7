create database if not exists agenda;
use agenda;
 
create table if not exists contatos (
	id int auto_increment primary key,
    nome varchar(100) not null
);
 

USE agenda;
INSERT INTO contatos(nome)VALUES('Fulano');

USE agenda;
SELECT * FROM contatos;

USE agenda;
DELETE FROM contatos WHERE id IN (7, 6, 5, 4);


