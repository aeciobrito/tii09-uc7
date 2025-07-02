<?php
require_once __DIR__ . '/../model/Produto.php';
require_once __DIR__ . '/../Database.php';

class ProdutoDAO
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function getAll(): array
    {
        $stmt = $this->db->query("SELECT * FROM produtos");
        $produtosDados = $stmt->fetchAll();
        $produtos = [];

        foreach ($produtosDados as $p) {
            $produtos[] = new Produto(
                $p['id'],
                $p['nome'],
                $p['preco'],
                $p['ativo'],
                $p['dataDeCadastro'],
                $p['dataDeValidade']
            );
        }

        return $produtos;
    }

    public function getById(int $id): ?Produto
    {
        $stmt = $this->db->prepare("SELECT * FROM produtos WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $data = $stmt->fetch();

        return $data ? new Produto(
            $data['id'],
            $data['nome'],
            $data['preco'],
            $data['ativo'],
            $data['dataDeCadastro'],
            $data['dataDeValidade']
        ) : null;
    }

    public function create(Produto $produto): bool
    {
        $sql = "INSERT INTO produtos (nome, preco, ativo, dataDeCadastro, dataDeValidade) 
                VALUES (:nome, :preco, :ativo, :dataDeCadastro, :dataDeValidade)";
        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            ':nome' => $produto->getNome(),
            ':preco' => $produto->getPreco(),
            ':ativo' => $produto->getAtivo() ? 1 : 0,
            ':dataDeCadastro' => $produto->getDataDeCadastro(),
            ':dataDeValidade' => $produto->getDataDeValidade()
        ]);
    }

    public function update(Produto $produto): bool
    {
        $sql = "UPDATE produtos 
                SET nome = :nome, preco = :preco, ativo = :ativo, 
                    dataDeCadastro = :dataDeCadastro, dataDeValidade = :dataDeValidade 
                WHERE id = :id";
        $stmt = $this->db->prepare($sql);

        return $stmt->execute(
            [
                ':id' => $produto->getId(),
                ':nome' => $produto->getNome(),
                ':preco' => $produto->getPreco(),
                ':ativo' => $produto->getAtivo() ? 1 : 0,
                ':dataDeCadastro' => $produto->getDataDeCadastro(),
                ':dataDeValidade' => $produto->getDataDeValidade()
            ]
        );
    }

    public function delete(int $id): bool
    {
        $stmt = $this->db->prepare("DELETE FROM produtos WHERE id = :id");
        return $stmt->execute([':id' => $id]);
    }
}
