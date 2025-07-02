<?php

function saudacao() {
    echo "Bem vindo ao sistema! <br>";
}

saudacao();

function somar($a, $b) {
    return $a + $b;
}

echo "Retorno da soma: " . somar(10, 8) . "<br>";

function subtrair(int $a, int $b) {
    return $a - $b;
}

echo "Retorno da subtração" . subtrair(10.5,8) . "<br>";

function multiplicar(int $a, int $b): int {
    return $a * $b;
}

echo "Retorno da multiplicação" . multiplicar(10,8) . "<br>";

function dividir(int $a, int $b): float | string {
    if ($b == 0) {
        return "Impossível dividir por zero!";
    }
    return $a / $b;
}

echo "Retorno da divisao: " . dividir(10, 0) . "<br>";

// function saudacao2(): void {
//     echo "Bem vindo ao sistema! <br>";
// }

// saudacao2();

function listarNomes(array $nomes): void {
    foreach($nomes as $n) {
        echo "<li>$n</li>";
    }
}

$professores = ["Celso", "Luana", "Arlindo"];
echo "<ul>";
listarNomes($professores);
echo "</ul>";