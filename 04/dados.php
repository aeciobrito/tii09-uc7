<?php

// Cria um array de produtos, cada um com nome e preço
$produtos = [
    ["nome" => "Pão", "preco" => 1.50],
    ["nome" => "Café", "preco" => 3.00],
    ["nome" => "Leite", "preco" => 4.80]
];

// Define uma função para calcular o total dos preços dos produtos
function calcularTotalProdutos(array $itens): float {
    $total = 0; // Inicializa a variável total com zero

    // Percorre cada item do array de produtos
    foreach($itens as $item) {
        $total += $item['preco']; // Soma o preço do item ao total
    }

    return $total; // Retorna o valor total calculado
}

// Exibe o total dos produtos formatado em reais (R$), com 2 casas decimais, vírgula como separador decimal e ponto como separador de milhar
echo "Total: R$ " . number_format(calcularTotalProdutos($produtos), 2 , ',' , '.') . "<br>";

echo "<br>"; // Adiciona uma quebra de linha no HTML

// Linha comentada — se fosse ativada, exibiria o resultado da soma de 1.2 + 1.31
// echo 1.2 + 1.31;

// Função que encontra o produto mais barato no array
function encontrarProdutoMaisBarato(array $itens): array {
    // Inicialmente assume que o primeiro item é o mais barato
    $maisBarato = $itens[0];

    // Percorre todos os itens para verificar se existe algum com preço menor
    foreach ($itens as $item) {
        if ($item['preco'] < $maisBarato['preco']) {
            $maisBarato = $item; // Atualiza o mais barato
        }
    }

    return $maisBarato; // Retorna o produto mais barato encontrado
}

// Chama a função para encontrar o produto mais barato e armazena em $barato
$barato = encontrarProdutoMaisBarato($produtos);

// Exibe o nome e o preço do produto mais barato formatado em reais
echo "Produto mais barato: {$barato['nome']} R$ " . number_format($barato['preco'], 2, ',', '.' ) . "<br>";

// ---------------------------------------------------
// código do professor 
// $maisBarato = $produtos[0];

// if($produtos[1]['preco'] < $produtos[0]['preco']) {
//     $maisBarato = $produtos[1];
// }

// echo $maisBarato['nome'];

function produtoMaisBarato(array $itens): array {
    $maisBarato = $itens[0];
    
    foreach($itens as $item) {
        if($item['preco'] < $maisBarato['preco']) {
            $maisBarato = $item;
        }
    }

    return $maisBarato;
}


$resultado = produtoMaisBarato($produtos);
echo "O item mais barato da lista é {$resultado['nome']} 
        no preço de {$resultado['preco']}";