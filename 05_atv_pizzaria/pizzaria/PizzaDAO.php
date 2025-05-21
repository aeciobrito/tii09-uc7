<?php
require 'Pizza.php';
require 'Database.php';

class PizzaDAO
{
    private $db; // usado em todas as funções

    public function __construct()
    {
        $this->db = Database::getInstance();        
    }

    // buscar todas as pizzas armazenadas no banco de dados e retorná-las em um array.
    public function getAll(): array
    {        
        $stmt = $this->db->query("SELECT * FROM pizza");
        $pizzas = []; // inicializa um array vazio

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $pizzas[] = new Pizza($row['id'], $row['sabor'], $row['tamanho'], $row['preco']);
        }

        return $pizzas;        
    }

    // buscar uma pizza específica no banco de dados com base no seu ID.
    public function getById(int $id): ?Pizza
    {
        $stmt = $this->db->prepare("SELECT * FROM pizza WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row ? new Pizza($row['id'], $row['sabor'], $row['tamanho'], $row['preco']) : null;
    }

    // create
    public function create(Pizza $pizza): void
    {
        $stmt = $this->db->prepare("INSERT INTO pizza (sabor, tamanho, preco) 
                                   VALUES (:sabor, :tamanho, :preco)");

        $sabor = $pizza->getSabor();
        $tamanho = $pizza->getTamanho();
        $preco = $pizza->getPreco();

        $stmt->bindParam(':sabor', $sabor);
        $stmt->bindParam(':tamanho', $tamanho);
        $stmt->bindParam(':preco', $preco);
        $stmt->execute();
    }

    // update
    public function update(Pizza $pizza): void
    {
        $stmt = $this->db->prepare("UPDATE pizza SET sabor = :sabor, tamanho = :tamanho, preco = :preco 
                                   WHERE id = :id");

        $id = $pizza->getId();
        $sabor = $pizza->getSabor();
        $tamanho = $pizza->getTamanho();
        $preco = $pizza->getPreco();

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':sabor', $sabor);
        $stmt->bindParam(':tamanho', $tamanho);
        $stmt->bindParam(':preco', $preco);
        $stmt->execute();
    }

    // delete
    public function delete(int $id): void
    {
        $stmt = $this->db->prepare("DELETE FROM pizza WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
}
