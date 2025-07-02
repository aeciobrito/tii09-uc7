<?php

require 'PizzaDAO.php';

$bd = new PizzaDAO();
$pizzas = $bd->getAll();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Pizzas</title>    
</head>
<body>
    <h2>Lista de Pizzas</h2>

    <table border="1" cellpading="5">
        <tr><th>ID</th><th>SABOR</th><th>TAMANHO</th><th>PREÇO</th></tr>
        <?php foreach($pizzas as $p): ?>
            <tr>
                <td><?= $p->getId() ?></td>
                <td><?= $p->getSabor() ?></td>
                <td><?= $p->getTamanho() ?></td>
                <td><?= $p->getPreco() ?></td>

                

            </tr>
        <?php endforeach; ?>
    </table>
    <br>
    <a href="pizza_form.php">Cadastrar Nova</a>
</body>
</html>

<!-- CREATE TABLE IF NOT EXISTS pizza (
	id INT AUTO_INCREMENT PRIMARY KEY,
	sabor VARCHAR(100) NOT NULL,
    tamanho VARCHAR(10) NOT NULL,
    preco DECIMAL(10, 2) NOT NULL
); -->
