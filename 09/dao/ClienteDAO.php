<?php

require_once __DIR__ . '/../model/Cliente.php';
require_once __DIR__ . '/../Database.php';

class ClienteDAO
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function getAll(): array
    {
        $stmt = $this->db->query("SELECT * FROM clientes");
        $clientesData = $stmt->fetchAll();
        $clientes = [];
        
        foreach($clientesData as $data) {
            $clientes[] = new Cliente($data['id'], $data['nome'], $data['cpf'], $data['dataDeNascimento'], $data['ativo']);
        }

        return $clientes;
    }

    public function getById(int $id): ?Cliente
    {
        $stmt = $this->db->prepare("SELECT * FROM clientes WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $data = $stmt->fetch();
        if($data){
            return new Cliente($data['id'], $data['nome'], $data['cpf'], $data['dataDeNascimento'], $data['ativo']);
        }
        return null;
    }

    public function create(Cliente $cliente): bool
    {
        $sql = "INSERT INTO clientes (nome, cpf, dataDeNascimento, ativo) VALUES (:nome, :cpf, :dataDeNascimento, :ativo)";
        $stmt = $this->db->prepare($sql);
        
        return $stmt->execute([
            ':nome' => $cliente->getNome(),
            ':cpf' => $cliente->getCpf(),
            ':dataDeNascimento'=> $cliente->getDataDeNascimento(),
            ':ativo' => $cliente->getAtivo() ? 1 : 0
        ]);
    }

    public function update(Cliente $cliente, int $id): bool
    {
        $sql = "UPDATE clientes SET nome = :nome, cpf = :cpf, dataDeNascimento = :dataDeNascimento, ativo = :ativo WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        
        return $stmt->execute([
            ':id'=>$cliente->getId(),
            ':nome' => $cliente->getNome(),
            ':cpf' => $cliente->getCpf(),
            ':dataDeNascimento'=> $cliente->getDataDeNascimento(),
            ':ativo' => $cliente->getAtivo() ? 1 : 0
        ]);
    }   

    public function delete(int $id): bool
{
    $stmt = $this->db->prepare("DELETE FROM clientes WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    
    return $stmt->rowCount() > 0; // Retorna true somente se uma linha foi excluída
}

}
// <!-- ORM (Object-Relational Mapping) -->

?>

