<?php

class Pizza
{
    private ?int $id;
    private string $sabor;
    private string $tamanho;
    private float $preco;

    public function __construct(?int $id, string $sabor, string $tamanho, float $preco)
    {
        $this->id = $id;
        $this->sabor = $sabor;
        $this->tamanho = $tamanho;
        $this->preco = $preco;
    }

    public function getId(): ?int { return $this->id; }
    public function getSabor(): string { return $this->sabor; }
    public function getTamanho(): string { return $this->tamanho; }
    public function getPreco(): float { return $this->preco; }

    public function setPreco(float $novoPreco): void
    {
        if ($novoPreco > 0) {
            $this->preco = $novoPreco;
        }
    }

    public function __toString(): string
    {
        return "Pizza de $this->sabor, tamanho $this->tamanho e preço $this->preco <br>";
    }
}

// $Pizza01 = new Pizza(null, 'Calan', 'G', 50.0);
// print_r($Pizza01);
