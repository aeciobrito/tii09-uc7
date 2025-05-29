<?php

require_once 'Cliente.php';
require_once 'Database.php';

Class ClienteDAO 
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }
    
    public function getAll(): array
    {
        $resultadoDoBanco = $this->db->query('SELECT * FROM clientes');
        $clientes = [];

        while($row = $resultadoDoBanco->fetch(PDO:: FETCH_ASSOC)) {
            $clientes[] = new Cliente(
                $row['id'],
                $row['nome'],
                $row['cpf'],
                $row['ativo'],
                $row['dataDeNascimento']
            );
        }
        return $clientes;
    }

    public function getById(int $id): ?Cliente
    {
        $sql = 'SELECT * FROM clientes WHERE id = :id';

        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id'=>$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row? new Cliente(
            $row['id'],
            $row['nome'],
            $row['cpf'],
            $row['ativo'],
            $row['dataDeNascimento']
        ): null;
    }

    public function create(Cliente $cliente): void 
    {
        $sql = 'INSERT INTO clientes (nome, cpf, ativo, dataDeNascimento) VALUES (:nome, :cpf, :ativo, :nascimento)';

        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':nome' => $cliente->getNome(),
            ':cpf'=> $cliente->getCpf(),
            ':ativo'=> $cliente->getAtivo(),
            ':nascimento'=> $cliente->getDataDeNascimento()
        ]);
    }



    public function update(Cliente $cliente): void 
    {
        $sql = 'UPDATE clientes SET nome = :nome, cpf = :cpf, ativo = :ativo, dataDeNascimento = :nascimento WHERE id = :id';
        $stmt = $this->db->prepare($sql);

        $stmt->execute([
            ':id' => $cliente->getId(),
            ':nome' => $cliente->getNome(),
            ':cpf'=> $cliente->getCpf(),
            ':ativo'=> $cliente->getAtivo(),
            ':nascimento'=> $cliente->getDataDeNascimento()
        ]);
    }

    public function delete(int $id ): void
    {
        $stmt = $this->db->prepare('DELETE FROM clientes WHERE id = :id');
        $stmt->execute(['id' => $id]);
    }

}
// USE venda;
// SELECT * FROM clientes;

// $dao = new ClienteDAO();

// $cliente02 = new Cliente(null, 'Teste01', '12345678998', 1,'2025-10-10' );
// ($dao->create($cliente02));

// // Exibindo os valores dos atributos usando os getters
// echo "Nome: " . $cliente02->getNome() . "<br>";
// echo "CPF: " . $cliente02->getCpf() . "<br>";
// echo "Ativo: " . ($cliente02->getAtivo() ? "Sim" : "Não") . "<br>";
// echo "Data de Nascimento: " . $cliente02->getDataDeNascimento() . "<br>";

