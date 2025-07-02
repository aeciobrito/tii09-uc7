-- Criação do banco de dados
CREATE DATABASE IF NOT EXISTS gestao_hospitalar;
USE gestao_hospitalar;

-- Configurações iniciais
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
SET NAMES utf8mb4;
SET CHARACTER SET utf8mb4;

-- Tabela: pacientes
CREATE TABLE pacientes (
  id INT(11) NOT NULL AUTO_INCREMENT,
  nome VARCHAR(45) NOT NULL,
  sobrenome VARCHAR(30) NOT NULL,
  data_nascimento VARCHAR(20) NOT NULL,
  sexo VARCHAR(20) NOT NULL,
  data_cadastro VARCHAR(20) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Inserção de pacientes
INSERT INTO pacientes (id, nome, sobrenome, data_nascimento, sexo, data_cadastro) VALUES
(1, 'Tiago Cardoso', 'Gonçalves', '1989-05-05', 'masculino', '2025-06-11'),
(3, 'Natalia Cardoso', 'Gonçalves', '1997-11-17', 'feminino', '2025-06-11');

-- Tabela: medico
CREATE TABLE medico (
  id INT(11) NOT NULL AUTO_INCREMENT,
  nome VARCHAR(45) NOT NULL,
  especialidade VARCHAR(30) NOT NULL,
  crm VARCHAR(20) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Tabela: consultas
CREATE TABLE consultas (
  id INT(11) NOT NULL AUTO_INCREMENT,
  data DATE NOT NULL,
  horas TIME NOT NULL,
  especialidade VARCHAR(20) NOT NULL,
  paciente_id INT(11) NOT NULL,
  medico_id INT(11) NOT NULL,
  PRIMARY KEY (id),
  KEY fk_consultas_pacientes (paciente_id),
  KEY fk_consultas_medicos (medico_id),
  CONSTRAINT fk_consultas_pacientes FOREIGN KEY (paciente_id) REFERENCES pacientes (id),
  CONSTRAINT fk_consultas_medicos FOREIGN KEY (medico_id) REFERENCES medico (id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Tabela: convenio
CREATE TABLE convenio (
  id INT(11) NOT NULL AUTO_INCREMENT,
  empresa VARCHAR(30) NOT NULL,
  cnpj VARCHAR(20) NOT NULL,
  telefone VARCHAR(20) NOT NULL,
  email VARCHAR(20) NOT NULL,
  paciente_id INT(11) NOT NULL,
  PRIMARY KEY (id),
  KEY fk_convenio_paciente (paciente_id),
  CONSTRAINT fk_convenio_paciente FOREIGN KEY (paciente_id) REFERENCES pacientes (id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Inserção de convenio
INSERT INTO convenio (id, empresa, cnpj, telefone, email, paciente_id) VALUES
(2, 'unimed', '46.124.624/0001-11', '1343789060', 'unimed@ig.com.br', 1);

-- Tabela: endereco
CREATE TABLE endereco (
  id INT(11) NOT NULL AUTO_INCREMENT,
  logradouro VARCHAR(45) NOT NULL,
  bairro VARCHAR(20) NOT NULL,
  cidade VARCHAR(20) NOT NULL,
  estado VARCHAR(10),
  paciente_id INT(11) NOT NULL,
  PRIMARY KEY (id),
  KEY fk_endereco_pacientes (paciente_id),
  CONSTRAINT fk_endereco_pacientes FOREIGN KEY (paciente_id) REFERENCES pacientes (id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Inserção de endereço
INSERT INTO endereco (id, logradouro, bairro, cidade, estado, paciente_id) VALUES
(1, 'Rua Vitória 76', 'Pq Montreal', 'Franco da Rocha', 'SP', 1);

-- Tabela: usuario
CREATE TABLE usuario (
  id INT(11) NOT NULL AUTO_INCREMENT,
  nome VARCHAR(45) NOT NULL,
  email VARCHAR(45) NOT NULL,
  senha VARCHAR(150) NOT NULL,
  token VARCHAR(150) NOT NULL,
  PRIMARY KEY (id),
  UNIQUE KEY email (email)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Inserção de usuário
INSERT INTO usuario (id, nome, email, senha, token) VALUES
(0, 'Carlos Alexandre', 'carllos3939@gmail.com', '$2y$10$m02fCR8qbpdkSO0zEsrnZeBSYn1NuJLha2TsCpYPSd20I3x/T/YWK', '19533476811494356b42fabf31ab01b724d4293eb8cd68a3f5');

COMMIT;
