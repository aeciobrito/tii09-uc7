<?php

## REPETIÇÕES
// for
for($i = 1; $i < 5; $i++) {
    echo "Funciona $i!  <br>";
}

// while
$contador = 1;
while ($contador < 5) {
    echo "Contando: $contador <br>";
    $contador++;
}

// array
$nomes = ["Adenilsa", "Carlos", "Gustavo", "Gabriel"];

// for($i = 0; $i < count($nomes); $i++) {
//     echo "Olá,  $nomes[$i] ! <br>";
// }

foreach($nomes as $n) {
    echo "Olá, $n! <br>";
}
