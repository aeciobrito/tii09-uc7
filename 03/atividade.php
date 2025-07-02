<?php
/*
Crie um array com 4 nomes de alunos e exiba-os em uma lista <ul>
no navegador
*/

// Cria um array simples com nomes de alunos
$alunos = ["Adenilsa", "Carlos", "Gustavo", "Gabriel"];

// Exibe um título no navegador
echo "<h2>Alunos</h2>";

// Percorre o array de alunos e exibe cada nome dentro de uma tag <li>
foreach ($alunos as $aluno) {
    echo "<li>$aluno</li>";
}

// Cria um array multidimensional com nome e idade de cada aluno
$alunos2 = [
    ["nome" => "Adenilsa", "idade" => 20],
    ["nome" => "Carlos", "idade" => 22],
    ["nome" => "Gustavo", "idade" => 23],
    ["nome" => "Gabriel", "idade" => 24]
];

// Exibe um novo título
echo "<h2>Alunos 2</h2>";

// Percorre o array de alunos2 e exibe nome e idade em uma lista
foreach ($alunos2 as $aluno) {
    echo "<li>Nome: {$aluno['nome']}, Idade: {$aluno['idade']}</li>";
}

// Cria um array multidimensional mais completo com nome, idade e nota de cada aluno
$alunos3 = [
    ["nome" => "Adenilsa", "idade" => 20, "nota" => 8.5],
    ["nome" => "Carlos", "idade" => 22, "nota" => 7.0],
    ["nome" => "Gustavo", "idade" => 23, "nota" => 9.0],
    ["nome" => "Gabriel", "idade" => 24, "nota" => 6.5]
];

// Cria uma tabela HTML com cabeçalho e colunas para nome, idade e nota
echo "<table border='1'>
        <th colspan='3'> Alunos 3</th> <!-- Cabeçalho da tabela ocupando 3 colunas -->
        <tr>
            <th>Nome</th> <!-- Coluna para o nome -->
            <th>Idade</th> <!-- Coluna para a idade -->
            <th>Nota</th> <!-- Coluna para a nota -->
        </tr>";
?>



<hr>

<?php
// Percorre o array alunos3 e cria uma linha da tabela para cada aluno

// Exibe a nota do aluno formatada com:
// - 2 casas decimais
// - vírgula (',') como separador decimal (padrão brasileiro)
// - ponto ('.') como separador de milhar
// Exemplo: 8.5 será exibido como "8,50" e 1234.56 como "1.234,56"

foreach ($alunos3 as $aluno3) {
    echo "
            <tr>
                <td>{$aluno3['nome']}</td> <!-- Exibe o nome -->
                <td>{$aluno3['idade']}</td></br> <!-- Exibe a idade (o </br> é desnecessário aqui) -->
                <td>" . number_format($aluno3['nota'], 2, ',', '.') . "</td> <!-- Formata a nota com 2 casas decimais, vírgula como separador decimal e ponto como separador de milhar -->
            </tr>
        ";
}
?>

<table border="2">
<hr>
<?php
$clientes =
    [
        [
            "nome" => "John",
            "cpf" => "11122233344",
            "cidade" => "Sao Paulo"
        ],
        [
            "nome" => "Mary",
            "cpf" => "33322211144",
            "cidade" => "Santo Andre"
        ]
    ];

    foreach($clientes as $c) {
        echo "<tr><td>{$c['nome']}</td><td>{$c['cpf']}</td><td>{$c['cidade']}</td></tr>";
    }
?>
</table>