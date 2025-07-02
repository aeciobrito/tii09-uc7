<?php

class Contato 
{
    private ?int $id;
    private string $nome;

    public function __construct(?int $id, string $nome)
    {
        $this->id = $id;
        $this->nome = $nome;
    }

    // Buscar Valores
    public function getId(): ?int { return $this->id; }
    public function getNome(): string { return $this->nome; }

    // Inserir Valores
    public function setNome(string $novoNome) 
    { 
        $this->nome = $novoNome; 
    }
}

// Teste para saber se está funcionando 
// $cont1 = new Contato( 1 , "Fulano");
// print_r($cont1);
// echo "<br>";
// echo $cont1->getNome();
// echo "<br>";

// class Contato
// {
//     private $pdo;

//     public function __construct()
//     {
//         try {
//             $this->pdo = new PDO("mysql:host=localhost;dbname=agenda", "root", "", [
//                 PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
//                 PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
//             ]);
//         } catch (PDOException $e) {
//             die("Erro na conexão: " . $e->getMessage());
//         }
//     }

//     public function inserir($nome)
//     {
//         $stmt = $this->pdo->prepare("INSERT INTO contatos (nome) VALUES (:nome)");
//         $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
//         return $stmt->execute();
//     }

//     public function listar()
//     {
//         $stmt = $this->pdo->query("SELECT * FROM contatos");
//         return $stmt->fetchAll();
//     }
// }

// // Testando a classe
// $contato = new Contato();
// $contato->inserir("João Silva");

// print_r($contato->listar());

?>
