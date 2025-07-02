<?php
    // 1 - Crie um formulário que receba 4 notas
    // 2 - Receba os valores da requisição no PHP
    // 3 - Converta os valores recebidos para float
    // 4 - Some os 4 valores e retorne a média
    // 5 - Escreva "Aprovado" (>=7), "Recuperação (>=5), "Reprovado

    // Obter valores das notas
        $nota1 = (float) $_GET['nota1'];
        $nota2 = (float) $_GET['nota2'];
        $nota3 = (float) $_GET['nota3'];
        $nota4 = (float) $_GET['nota4'];

    // Calcular a média
        $media = ($nota1 + $nota2 + $nota3 + $nota4) / 4 ;

    // Exibir a média formatada com 2 casas decimais
        echo "<h2>A média é: " . number_format($media, 2, ',', '.') . "</h2>";

        if ($media >= 7) {
            echo "<h2>Aprovado<h2>";
        } elseif ($media >= 5) {
            echo "<h2>Recuperação<h2>"; 
        } else {
            echo "<h2>Reprovado<h2>";
        }
?>