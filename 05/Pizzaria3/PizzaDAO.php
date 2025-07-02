<?php
require 'Pizza.php';
require 'Conexao.php';

class PizzaDAO
{
    private $db;

    public function __construct()
    {
        $this->db = Conexao::getBd();
    }

    public function getAll()
    {        
        $stmt = $this->db->query("SELECT * FROM pizza");
        $pizzas = [];

        while ($row = $stmt->fetch((PDO::FETCH_ASSOC))) {
            $pizzas[] = new Pizza(
                $row['id'],
                $row['sabor'],
                $row['tamanho'],
                $row['preco']
            );
        }
        return $pizzas;
    }
}
