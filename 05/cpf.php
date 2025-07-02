<!-- Aqui está um exemplo de classe PHP que valida e formata um CPF antes de armazená-lo:

<?php

class Produto {
    private string $nome;
    private float $preco;
    private string $cpf;

    public function __construct(string $nome, float $preco, string $cpf) {
        $this->nome = $nome;
        $this->preco = $preco;
        $this->setCpf($cpf);
    }

    public function getNome(): string {
        return $this->nome;
    }

    public function setNome(string $nome): void {
        if (!empty($nome)) {
            $this->nome = $nome;
        }
    }

    public function getCpf(): string {
        return $this->cpf;
    }

    public function setCpf(string $cpf): void {
        if ($this->validarCpf($cpf)) {
            $this->cpf = $this->formatarCpf($cpf);
        } else {
            throw new Exception("CPF inválido!");
        }
    }

    private function validarCpf(string $cpf): bool {
        $cpf = preg_replace('/[^0-9]/', '', $cpf); // Remove caracteres não numéricos
        
        if (strlen($cpf) != 11 || preg_match('/^(.)\1*$/', $cpf)) {
            return false; // CPF inválido
        }

        for ($t = 9; $t < 11; $t++) {
            $d = 0;
            for ($c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                return false;
            }
        }

        return true;
    }

    private function formatarCpf(string $cpf): string {
        $cpf = preg_replace('/[^0-9]/', '', $cpf); // Remove caracteres não numéricos
        return substr($cpf, 0, 3) . '.' . substr($cpf, 3, 3) . '.' . substr($cpf, 6, 3) . '-' . substr($cpf, 9, 2);
    }
}

// Teste
try {
    $p1 = new Produto('Abóbora', 5.2, '12345678909');
    print_r($p1);
} catch (Exception $e) {
    echo $e->getMessage();
}

// Explicação:
// 1. **Validação do CPF**: Remove caracteres não numéricos e verifica se o número segue o padrão correto.
// 2. **Evita CPFs inválidos**: Exclui sequências repetidas (como `11111111111`) e usa um cálculo matemático para validar os dígitos.
// 3. **Formatação**: Converte um CPF numérico (`12345678909`) para o formato padrão (`123.456.789-09`).
// 4. **Tratamento de erros**: Se um CPF for inválido, a classe lançará uma exceção.

// Isso garante que qualquer CPF armazenado esteja válido e bem formatado. 🚀 Se quiser ajustes, só avisar! 
