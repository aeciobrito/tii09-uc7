<?php

// -- CRIA A TABELA DE CLIENTES
// CREATE TABLE IF NOT EXISTS clientes (
//     id INT AUTO_INCREMENT PRIMARY KEY,
//     nome VARCHAR(100) NOT NULL,
//     cpf VARCHAR(14) NOT NULL,
//     ativo BOOLEAN NOT NULL DEFAULT 1,
//     dataDeNascimento DATE NOT NULL
// );

class Cliente
{
    // Atributos da classe Cliente 
    private ?int $id; // ID único do cliente, pode ser null
    private string $nome; // Nome do Cliente 
    private string $cpf; // CPF do cliente 
    private bool $ativo; // Indicador booleano do cliente 
    private string $dataDeNascimento; // Data de Nascimento do cliente 

    public function __construct(
        ?int $id,
        string $nome,
        string $cpf,
        bool $ativo,
        string $dataDeNascimento
    ) {
        // $this-> acessa propriedade e métodos do objeto 
        $this->id = $id;
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->ativo = $ativo;
        $this->dataDeNascimento = $dataDeNascimento;
    }

    // Getters - Métodos para acessar propriedades privadas
    public function getId(): ?int { return $this->id; }
    public function getNome(): string { return $this->nome; }
    public function getCpf(): string { return $this->cpf; }
    public function getAtivo(): bool { return $this->ativo; }
    public function getDataDeNascimento(): string { return $this->dataDeNascimento; }

    // Setters - Métodos para modificar atributos de forma segura
    public function setNome(string $nome): void { $this->nome = $nome; }
    public function setCpf(string $cpf): void { $this->cpf = $cpf; }
    public function setAtivo(bool $ativo): void { $this->ativo = $ativo; }
    public function setDataDeNascimento(string $dataDeNascimento): void { $this->dataDeNascimento = $dataDeNascimento; }
}

// Criando um novo Cliente 
// $cliente01 = new Cliente(
//     99,
//     'Cliente99',
//     '12345678987',
//     true,
//     '2025-05-27'
// );

// // Exibindo os valores dos atributos usando os getters
// echo "Nome: " . $cliente01->getNome() . "<br>";
// echo "CPF: " . $cliente01->getCpf() . "<br>";
// echo "Ativo: " . ($cliente01->getAtivo() ? "Sim" : "Não") . "<br>";
// echo "Data de Nascimento: " . $cliente01->getDataDeNascimento() . "<br>";
