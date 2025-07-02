<?php

$a = 10;
$b= 5;

echo ($a + $b) . "<br>";

echo "Soma: " . ($a + $b) ."<br>";

echo "Outra linha" . "<br>";

echo ($a > $b ? "SIM" : "NÃO") . "<br>";

echo ($a < $b ? "SIM" : "NÃO") . "<br>";

echo ($a = $b ? "SIM" : "NÃO") . "<br>";

echo ($a == $b ? "SIM" : "NÃO") . "<br>";

function classificarIdade($idade) {
    if ($idade <= 17) {
        return "Menor de idade". "<br>";
    } else if ($idade >= 18 && $idade <= 60) {
        return "Maior de idade". "<br>";
    } else {
        return "Idoso". "<br>";
    }
}

// Exemplo de uso
$idade = 17;
echo classificarIdade($idade);


function diasDaSemana($dia) {
    $dia = "segunda";

    switch($dia) {
        case "segunda":
            echo "Hoje é segunda-feira". "<br>";
            break;
        case "sexta": 
            echo "Hoje é sexta-feira". "<br>";
            break;
    }
}

// Exemplo de uso
$dia = "segunda";
echo diasDaSemana($dia);








?>