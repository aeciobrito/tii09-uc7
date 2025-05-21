<?php

class Cliente {
    private string $nome;
    private string $veiculo;
    private string $telefone;

    public function __construct(string $nome, string $veiculo, string $telefone)
    {      
        $this->nome = $nome;
        $this->veiculo = $veiculo;
        $this->telefone = $telefone;
    }

    public function setTelefone(string $novoNumero): void {
        if(strlen($novoNumero) == 11) {
            $this->telefone = $novoNumero;
        } else {
            echo "Telefone inválido <br>";
        }        
    }

    public function __toString()
    {
        return "$this->nome, $this->veiculo, $this->telefone <br>";
    }
}

$cliente = new Cliente("Hugo", "Monza", "9911553345");
echo($cliente);

$cliente->setTelefone("11955778899");
echo($cliente);