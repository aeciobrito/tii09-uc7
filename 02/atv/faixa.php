<?php
// Crie um formulário que recebe uma idade (inteiro)
// Veriquei se idade:
// - Menor que 12: Criança
// - Menor que 18: Adolescente
// - Menor que 60: Adulto
// - Qualquer outra idade: Idoso

// $idade = (name="idade")
$idade = (int) $_GET['idade'];
if ($idade < 12){
    echo "<h2>Criança, tem $idade anos </h2>";
} elseif ($idade < 18){
    echo "<h2>Adolescente, tem $idade anos</h2>";
} elseif ($idade < 60){
    echo "<h2>Adulto, tem $idade anos</h2>";
}else {   
    echo "<h2>Idoso, tem $idade anos</h2>";
}

?>