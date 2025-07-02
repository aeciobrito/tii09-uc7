<?php

/*
- Cliente
Propriedades: nome, veiculo, telefone (todos private string)
Construtor que recebe todas as propreidades
Sobrescreva __toString() para visualizarmos os dados
Crie um get para o "nome" e um set para o "telefone"
*/

class Cliente {
    private string $nome;
    private string $veiculo;
    private string $telefone;
        
    public function __construct(string $nome, string $veiculo, string $telefone) {
        $this->nome = $nome;
        $this->veiculo = $veiculo;
        $this->telefone = $telefone;
    }

    // add Método para definir todos os atributos de uma vez
    public function setDados(string $nome, string $veiculo, string $telefone): void {
        $this->nome = $nome;
        $this->veiculo = $veiculo;
        $this->telefone = $telefone;
    }

    public function getNome(): string {
        return $this->nome;
    }

    public function getVeiculo(): string {
        return $this->veiculo;
    }

    public function getTelefone(): string {
        return $this->telefone;
    }

    public function setNome(string $nome): void {
        if(strlen($nome) > 2) {
            $this->nome = $nome;
        } else {
            throw(new Error("Invalid Name"));
        }
    }

    public function setVeiculo (string $veiculo) : void {
        if(strlen($veiculo) > 2) {
            $this->veiculo = $veiculo;
        } else {
            throw(new Error("Invalid Veículo"));
        }
    }

    public function setTelefone(string $telefone) : void {
        if(strlen($telefone) >= 8) {
            $this->telefone = $telefone;
        } else {
            throw(new Error("Invalid Phone"));
        }
    }

    public function __toString() {
        return "<br>"
            . "Nome: $this->nome, "
            . "Veículo: $this->veiculo, "
            . "Telefone: $this->telefone <br>";
    }
    
}


$Teste = new Cliente("João", "Fusca", "123456789");
print_r($Teste . "<br>");
// echo "<br>";
echo ($Teste->getNome() . "<br>");
echo ($Teste->getVeiculo() . "<br>");
echo ($Teste->getTelefone() . "<br>");

echo "<br>";

$Teste->setNome("Maria");
echo ($Teste->getNome() . "<br>");

$Teste->setVeiculo("Monza");
echo ($Teste->getVeiculo() . "<br>");

$Teste->setTelefone("40028922");
echo ($Teste->getTelefone() . "<br>");

echo "<br>";

print_r($Teste . "<br>");

// Agora, chamar setDados() para modificar tudo de uma vez só:

$Teste02 = new Cliente("João", "Fusca", "123456789");
print_r($Teste02 . "<br>");
$Teste02->setDados("Maria", "Monza", "40028922"); // Definindo todos os valores
echo ($Teste02->getNome() . "<br>");
echo ($Teste02->getVeiculo() . "<br>");
echo ($Teste02->getTelefone() . "<br>");


