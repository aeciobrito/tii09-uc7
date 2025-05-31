<?php

class Cliente implements JsonSerializable
{
    private ?int $id;
    private string $nome;
    private string $cpf;
    private string $dataDeNascimento;
    private bool $ativo;

    public function __construct(?int $id, string $nome, string $cpf, string $dataDeNascimento, bool $ativo)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->dataDeNascimento = $dataDeNascimento;
        $this->ativo = $ativo;
    }

    public function getId(): ?int { return $this->id; }
    public function getNome(): string { return $this->nome; }
    public function getCpf(): string { return $this->cpf; }
    public function getDataDeNascimento(): string { return $this->dataDeNascimento; }
    public function getAtivo(): bool { return $this->ativo; }

    public function jsonSerialize(): mixed
    {
        return [
            'id' => $this->id,
            'nome' => $this->nome,
            'cpf' => $this->cpf,
            'dataDeNascimento' => $this->dataDeNascimento,
            'ativo' => $this->ativo,
        ];
    }
}

// $cliente = new Cliente(1, "Minoru", "123.456.789-00", "1990-05-30", true);
// echo json_encode($cliente, JSON_PRETTY_PRINT);


// A implementação da interface `JsonSerializable` na classe `Cliente` permite que objetos dessa classe sejam **convertidos diretamente para JSON** quando usados com `json_encode()`. Isso é útil para APIs e sistemas que precisam enviar dados estruturados para o frontend ou outras aplicações.

// ### 🔍 Como funciona?
// 1️⃣ **A classe `Cliente` implementa `JsonSerializable`**  
//    - Isso obriga a classe a definir o método `jsonSerialize()`, que especifica **como o objeto deve ser convertido para JSON**.

// 2️⃣ **O método `jsonSerialize()` retorna um array associativo**  
//    - Esse array contém os atributos do objeto que serão incluídos na conversão para JSON.

// 3️⃣ **Uso com `json_encode()`**  
//    - Quando um objeto `Cliente` é passado para `json_encode()`, o PHP chama automaticamente `jsonSerialize()` e usa seu retorno para gerar o JSON.

// ### 🚀 Exemplo de uso:
// ```php
// $cliente = new Cliente(1, "Minoru", "123.456.789-00", "1990-05-30", true);
// echo json_encode($cliente, JSON_PRETTY_PRINT);
// ```
// Saída JSON:
// ```json
// {
//     "id": 1,
//     "nome": "Minoru",
//     "cpf": "123.456.789-00",
//     "dataDeNascimento": "1990-05-30",
//     "ativo": true
// }
// ```

// ### ⚠️ Problema no código
// O campo `'ativo' => $this->cpf` está incorreto. Ele deveria ser:
// ```php
// 'ativo' => $this->ativo
// ```
// Caso contrário, o JSON gerado terá o CPF no lugar do status de ativo/inativo.

// Se precisar de mais ajustes ou explicações, só me chamar! 🚀😃