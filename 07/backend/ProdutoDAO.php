<?php
// https://editor.swagger.io/ -> Swagger Editor é uma ferramenta open-source usada para criar, documentar e testar APIs utilizando

require_once 'Produto.php';
require_once 'Database.php';

// O DAO (Data Access Object) é um padrão de projeto usado para abstrair o acesso ao banco de dados em uma aplicação. Ele serve para encapsular a lógica de conexão e manipulação dos dados, garantindo que outras partes do sistema não precisem lidar diretamente com consultas SQL ou conexões com o banc

class ProdutoDAO
{
    private $db;  // Declara a propriedade $db para armazenar a instância do banco de dados

    public function __construct() // Construtor da classe ProdutoDAO
    {
        $db = Database::getInstance();  // Obtém a instância do banco de dados
    }

    
    // 

    public function getAll(): array // Busca todos os produtos no banco de dados
    {
        return []; // Retorna um array vazio (ainda precisa ser implementado para buscar os produtos)
    }

    public function getById(int $id): ?Produto // Busca um produto específico pelo ID
    {
        return null; // Retorna null porque a funcionalidade ainda não foi implementada
    }
    
    public function create(Produto $Produto): void // Insere um novo produto no banco de dados
    {

    }

    public function createInseguro(Produto $produto): void
    {
        $sql = "INSERT INTO produtos (nome, preco, ativo, dataDeCadastro, dataDeValidade) VALUES
                ({$produto->getNome()}, 
                {$produto->getPreco()}, 
                {$produto->getAtivo()},
                {$produto->getDataDeCadastro()}, 
                {$produto->getDataDeValidade()})";
        
        $this->db->query($sql);
    }

    public function createInseguro02(Produto $produto): void // Insere um novo produto no banco de dados, mas de forma insegura
    {
        $sql = "INSERT INTO produtos (nome, preco, ativo, dataDeCadastro, dataDeValidade) VALUES
                ({$produto->getNome()},  // Nome do produto diretamente concatenado na query
                {$produto->getPreco()},  // Preço do produto concatenado, vulnerável a SQL Injection
                {$produto->getAtivo()},  // Status do produto concatenado sem sanitização
                {$produto->getDataDeCadastro()},  // Data de cadastro sem validação
                {$produto->getDataDeValidade()})";  // Data de validade também concatenada diretamente

        $this->db->query($sql); // Executa a query sem proteção contra SQL Injection
    }


    public function update(Produto $Produto): void // Atualiza um produto no banco de dados
    {

    }

    public function delete(int $id): void // Deleta um produto no banco de dados
    {

    }

}

//

$dao = new ProdutoDAO();  // Instancia um objeto da classe ProdutoDAO, responsável por interagir com o banco de dados.

$produto = new Produto(  
    null,  // ID nulo, indicando que o produto ainda não está salvo no banco.
    "'Teste2', 0, 0, '2025-01-01', '2025-12-12'); DROP TABLE produtos --",  // Nome do produto com um comando SQL malicioso embutido.
    0,  // Preço do produto (pode ser um placeholder).
    0,  // Status do produto (0 = inativo).
    '2025-01-01',  // Data de cadastro do produto.
    '2025-12-12'  // Data de validade do produto.
);

$dao->createInseguro($produto);  // Chama o método para criar um novo produto, mas sem segurança adequada.

