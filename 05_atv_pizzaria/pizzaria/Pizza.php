<?php

// Declaração da classe Pizza
class Pizza
{
    // Atributos privados da classe
    private ?int $id;              // ID da pizza (pode ser null, por exemplo, ao criar uma nova pizza)
    private string $sabor;        // Sabor da pizza
    private string $tamanho;      // Tamanho da pizza (ex: P, M, G)
    private float $preco;         // Preço da pizza

    // Construtor da classe, chamado ao instanciar uma nova Pizza
    public function __construct(?int $id, string $sabor, string $tamanho, float $preco)
    {
        $this->id = $id;              // Atribui o ID
        $this->sabor = $sabor;        // Atribui o sabor
        $this->tamanho = $tamanho;    // Atribui o tamanho
        $this->preco = $preco;        // Atribui o preço
    }

    // Métodos getters para acessar os valores dos atributos

    public function getId(): ?int { return $this->id; }
    // Retorna o ID da pizza (ou null)

    public function getSabor(): string { return $this->sabor; }
    // Retorna o sabor da pizza

    public function getTamanho(): string { return $this->tamanho; }
    // Retorna o tamanho da pizza

    public function getPreco(): float { return $this->preco; }
    // Retorna o preço da pizza

    // Método setter para alterar o preço da pizza
    public function setPreco(float $novoPreco): void
    {
        if ($novoPreco > 0) {
            // Verifica se o novo preço é maior que zero
            $this->preco = $novoPreco; // Se for, atualiza o valor
        }
        // Se não for maior que zero, não faz nada (poderia ser tratado com exceção)
    }

    // Método mágico __toString: permite representar o objeto como string ao dar echo, por exemplo
    public function __toString(): string
    {
        return "Pizza de $this->sabor, tamanho $this->tamanho e preço $this->preco <br>";
        // Retorna uma descrição formatada da pizza
    }
}

// Exemplo comentado de uso:
// $Pizza01 = new Pizza(null, 'Calan', 'G', 50.0);
// Cria uma nova pizza com sabor 'Calan', tamanho 'G' e preço 50.0 (sem ID pois é nova)

// print_r($Pizza01);
// Exibe os dados do objeto pizza criado
