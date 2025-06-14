<?php
class Produto 
{
    // Atributos da classe Produto

    private ?int $id;// Identificador único do produto. // Pode ser null quando o produto ainda não foi salvo no banco de dados.
    
    private string $nome; // Nome do produto. Campo obrigatório.

    private float $preco; // Preço do produto. Utiliza ponto flutuante para representar valores com casas decimais.

    private bool $ativo; // Indica se o produto está ativo (true) ou inativo (false).
    
    private string $dataDeCadastro; // Data de cadastro do produto no sistema. // Representada como string, mas pode ser convertida para DateTime se necessário.

    private ?string $dataDeValidade; // Pode ser null para produtos que não expiram (ex: serviços ou itens sem vencimento). // Data de validade do produto.

    public function __construct( 
        ?int $id, // ID do produto (pode ser nulo caso ainda não esteja cadastrado)
        string $nome, // Nome do produto, obrigatório
        float $preco, // Preço do produto com casas decimais, obrigatório
        bool $ativo, // Status do produto (true = ativo, false = inativo)
        string $dataDeCadastro, // Data de cadastro do produto, obrigatória
        ?string $dataDeValidade // Data de validade do produto, opcional (pode ser nula)
    ) 
    {
        $this->id = $id; // Atribui o valor do parâmetro $id à propriedade da instância
        $this->nome = $nome; // Define o nome do produto com o valor passado no construtor
        $this->preco = $preco; // Inicializa o preço do produto
        $this->ativo = $ativo; // Define se o produto está ativo (true/false)
        $this->dataDeCadastro = $dataDeCadastro; // Registra a data de cadastro do produto
        $this->dataDeValidade = $dataDeValidade; // Define a data de validade (se aplicável)
    }    

    // Getters - Esses métodos getters garantem o acesso seguro às propriedades privadas
    public function getId(): int { return $this->id; }// Retorna o ID do produto
    public function getNome(): string { return $this->nome; }// Retorna o nome do produto
    public function getPreco(): float { return $this->preco; }// Retorna o preço do produto
    public function getAtivo(): bool { return $this->ativo; }// Retorna se o produto está ativo (true = ativo, false = inativo)
    public function getDataDeCadastro(): string { return $this->dataDeCadastro; }// Retorna a data de cadastro do produto
    public function getDataDeValidade(): string { return $this->dataDeValidade; }// Retorna a data de validade do produto (pode ser null)

    // Setters - Garantindo que você possa atualizar os atributos de forma segura
    public function setNome(string $nome): void { $this->nome = $nome; } // Define o nome do produto
    public function setPreco(float $preco): void { $this->preco = $preco; } // Define o preço do produto
    public function setAtivo(bool $ativo): void { $this->ativo = $ativo; } // Define o status do produto (true = ativo, false = inativo)
    public function setDataDeCadastro(string $dataDeCadastro): void { $this->dataDeCadastro = $dataDeCadastro; }   // Define a data de cadastro do produto
    public function setDataDeValidade(?string $dataDeValidade): void { $this->dataDeValidade = $dataDeValidade; }   // Define a data de validade do produto (pode ser null)

}

// // Criando um novo produto
// $produto = new Produto(
//     1,                     // ID do produto
//     "Pizza Calabresa",     // Nome do produto
//     39.90,                 // Preço do produto
//     true,                  // Produto ativo
//     "2025-05-21",          // Data de cadastro
//     "2025-06-21"           // Data de validade (pode ser null)
// );

// // Exibindo os valores dos atributos usando os getters
// echo "Nome: " . $produto->getNome() . "<br>";
// echo "Preço: R$ " . $produto->getPreco() . "<br>";
// echo "Ativo: " . ($produto->getAtivo() ? "Sim" : "Não") . "<br>";
// echo "Data de Cadastro: " . $produto->getDataDeCadastro() . "<br>";
// echo "Data de Validade: " . $produto->getDataDeValidade() . "<br>";

