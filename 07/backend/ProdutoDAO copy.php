<?php
// https://editor.swagger.io/ -> Swagger Editor é uma ferramenta open-source usada para criar, documentar e testar APIs utilizando

require_once 'Produto.php';
require_once 'Database.php';

// O DAO (Data Access Object) é um padrão de projeto usado para abstrair o acesso ao banco de dados em uma aplicação. Ele serve para encapsular a lógica de conexão e manipulação dos dados, garantindo que outras partes do sistema não precisem lidar diretamente com consultas SQL ou conexões com o banc

class ProdutoDAO
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function getAll(): array
    {
        $resultadoDoBanco = $this->db->query("SELECT * FROM produtos");
        $produtos = [];

        while($row = $resultadoDoBanco->fetch(PDO::FETCH_ASSOC)) {
            $produtos[] =  new Produto(
                $row['id'],
                $row['nome'],
                $row['preco'],
                $row['ativo'],
                $row['dataDeCadastro'],
                $row['dataDeValidade']
            );
        }

        return $produtos;
    }

    public function getById(int $id): ?Produto
    {
        $sql = "SELECT * FROM produtos WHERE id = :id";

        $stmt = $this->db->prepare($sql);        
        $stmt->execute([':id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row? new Produto(
            $row['id'],
            $row['nome'],
            $row['preco'],
            $row['ativo'],
            $row['cadastro'],
            $row['validade']
        ) : null;
    }

    public function create(Produto $produto): void 
    {
        $sql = "INSERT INTO produtos (nome, preco, ativo, cadastro, validade) VALUES
                (:nome, :preco, :ativo, :cadastro, :validade)";
        
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':nome' => $produto->getNome(),            
            ':preco' => $produto->getPreco(),            
            ':ativo' => $produto->getAtivo(),            
            ':cadastro' => $produto->getDataDeCadastro(),            
            ':validade' => $produto->getDataDeValidade(),           
        ]);
    }

    public function createInseguro(Produto $produto): void
    {
        $sql = "INSERT INTO produtos (nome, preco, ativo, dataDeCadastro, dataDeValidade) VALUES
            ({$produto->getNome()}, 
            {$produto->getPreco()}, 
            {$produto->getAtivo()},
            '{$produto->getDataDeCadastro()}', 
            '{$produto->getDataDeValidade()}')";

        $this->db->query($sql);
    }

    public function update(Produto $produto): void {}

    public function delete(int $id): void {}
}

$dao = new ProdutoDAO();
echo "<pre>";
print_r($dao->getById(1));


// SQL INJECTION:
// $dao = new ProdutoDAO();
// $produto = new Produto(null, "'Teste2', 0, 0, '2025-10-10', '2025-12-12'); DROP TABLE produtos --", 9.99, 1, '2025-01-01', '2025-12-12');

// $dao->createInseguro($produto);

// $dao = new ProdutoDAO();  // Instancia um objeto da classe ProdutoDAO, responsável por interagir com o banco de dados.
// echo "<pre>";

// getById
// print_r($dao->getById(1));

// create
$dao = new ProdutoDAO();
$produto = new Produto(null, 'Batata', 5.90, 1,'2025-10-10', '2025-10-10');
($dao->create($produto));

// $produto = new Produto(  
//     null,  // ID nulo, indicando que o produto ainda não está salvo no banco.
//     "'Teste2', 0, 0, '2025-01-01', '2025-12-12'); DROP TABLE produtos --",  // Nome do produto com um comando SQL malicioso embutido.
//     0,  // Preço do produto (pode ser um placeholder).
//     0,  // Status do produto (0 = inativo).
//     '2025-01-01',  // Data de cadastro do produto.
//     '2025-12-12'  // Data de validade do produto.
// );

// $dao->createInseguro($produto);  // Chama o método para criar um novo produto, mas sem segurança adequada.

