<?php

$salario = (float) $_GET["salario"];

// Faixa Salarial (R$)	INSS (%)	IRRF (%)	Dedução IRRF (R$)
// Até 1.518,00	7,5%	Isento	-
// 1.518,01 a 2.793,88	9%	Isento	-
// 2.793,89 a 4.190,83	12%	7,5%	169,44
// 4.190,84 a 8.157,41	14%	15%	381,44
// Acima de 8.157,41	14%	27,5%	896,00

// Quando uma condição no case é verdadeira, o código executa aquele pedaço específico.
switch (true) {
    case ($salario <= 1518.00):
        echo "<h2>Isento de Imposto de Renda</h2>";
        break;
    case ($salario > 1518.00 && $salario <= 2793.88):
        echo "<h2>Alíquota de 9% (Sem IRRF)</h2>";
        $desconto = ($salario * 0.09);
        echo "<h2>Salário: R$ $salario</h2>";
        $salario = $salario - $desconto;
        echo "<h2>Desconto: R$ $desconto</h2>";
        echo "<h2>Salário: R$ $salario</h2>";
        
        
        break;
    case ($salario > 2793.88 && $salario <= 4190.83):
        echo "<h2>Alíquota de 12%, IRRF de 7,5%</h2>";    
        $desconto = ($salario * 0.12);
        echo "<h2>Salário: R$ $salario</h2>";
        $salario = $salario - $desconto;
        echo "<h2>Desconto: R$ $desconto</h2>";
        echo "<h2>Salário: R$ $salario</h2>";
        break;
    case ($salario > 4190.83 && $salario <= 8157.41):
        echo "<h2>Alíquota de 14%, IRRF de 15%</h2>";
        $desconto = ($salario * 0.14);
        echo "<h2>Salário: R$ $salario</h2>";
        $salario = $salario - $desconto;
        echo "<h2>Desconto: R$ $desconto</h2>";
        echo "<h2>Salário: R$ $salario</h2>";
        break;
    case ($salario > 8157.41):
        echo "<h2>Alíquota de 14%, IRRF de 27,5%</h2>";      
        $desconto = ($salario * 0.14);
        echo "<h2>Salário: R$ $salario</h2>";
        $salario = $salario - $desconto;
        echo "<h2>Desconto: R$ $desconto</h2>";
        echo "<h2>Salário: R$ $salario</h2>";
        break;
    default:
        echo "<h2>Valor de salário inválido</h2>";
        break;

        

}

?>