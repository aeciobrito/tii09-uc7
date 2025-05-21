<?php
// Inclui os arquivos necessários: a classe Pizza e a conexão com o banco de dados
require 'Pizza.php';
require 'Database.php';

// Define a classe responsável pelo acesso ao banco de dados (Data Access Object - DAO)
class PizzaDAO
{
    // Atributo privado para armazenar a instância da conexão com o banco de dados
    private $db;

    // Construtor da classe - inicializa a conexão com o banco usando o padrão singleton
    public function __construct()
    {
        $this->db = Database::getInstance();        
    }

    // Método para buscar todas as pizzas no banco de dados
    public function getAll(): array
    {        
        $stmt = $this->db->query("SELECT * FROM pizza"); // Executa a consulta
        $pizzas = []; // Inicializa um array vazio para armazenar os resultados

        // Itera sobre os resultados da consulta e cria objetos Pizza
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $pizzas[] = new Pizza($row['id'], $row['sabor'], $row['tamanho'], $row['preco']);
        }

        return $pizzas; // Retorna o array de pizzas        
    }

    // Método para buscar uma pizza específica pelo ID
    public function getById(int $id): ?Pizza
    {
        $stmt = $this->db->prepare("SELECT * FROM pizza WHERE id = :id"); // Prepara a consulta com parâmetro
        $stmt->bindParam(':id', $id); // Liga o valor do ID ao parâmetro da query
        $stmt->execute(); // Executa a consulta
        $row = $stmt->fetch(PDO::FETCH_ASSOC); // Busca o resultado como array associativo

        // Retorna um objeto Pizza se encontrar, ou null se não encontrar
        return $row ? new Pizza($row['id'], $row['sabor'], $row['tamanho'], $row['preco']) : null;
    }

    // Método para inserir uma nova pizza no banco de dados
    public function create(Pizza $pizza): void
    {
        // Prepara a query SQL para inserção
        $stmt = $this->db->prepare("INSERT INTO pizza (sabor, tamanho, preco) 
                                   VALUES (:sabor, :tamanho, :preco)");

        // Obtém os dados da pizza
        $sabor = $pizza->getSabor();
        $tamanho = $pizza->getTamanho();
        $preco = $pizza->getPreco();

        // Liga os valores aos parâmetros da query
        $stmt->bindParam(':sabor', $sabor);
        $stmt->bindParam(':tamanho', $tamanho);
        $stmt->bindParam(':preco', $preco);

        $stmt->execute(); // Executa a inserção
    }

    // Método para atualizar os dados de uma pizza existente
    public function update(Pizza $pizza): void
    {
        // Prepara a query de atualização
        $stmt = $this->db->prepare("UPDATE pizza SET sabor = :sabor, tamanho = :tamanho, preco = :preco 
                                   WHERE id = :id");

        // Obtém os dados da pizza
        $id = $pizza->getId();
        $sabor = $pizza->getSabor();
        $tamanho = $pizza->getTamanho();
        $preco = $pizza->getPreco();

        // Liga os valores aos parâmetros
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':sabor', $sabor);
        $stmt->bindParam(':tamanho', $tamanho);
        $stmt->bindParam(':preco', $preco);

        $stmt->execute(); // Executa a atualização
    }

    // Método para excluir uma pizza do banco com base no ID
    public function delete(int $id): void
    {
        // Prepara a query de exclusão
        $stmt = $this->db->prepare("DELETE FROM pizza WHERE id = :id");
        $stmt->bindParam(':id', $id); // Liga o ID ao parâmetro
        $stmt->execute(); // Executa a exclusão
    }
}
