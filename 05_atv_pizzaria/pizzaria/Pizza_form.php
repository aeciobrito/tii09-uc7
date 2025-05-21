<?php

require_once 'PizzaDAO.php';
require_once 'Pizza.php';

$dao = new PizzaDAO();
$pizza = null; // Pizza para edição

// Editar Pizza
if(isset($_GET['id'])) {
    $pizza = $dao->getById($_GET['id']);
}

// Salvar Edição de Pizza
if(isset($_POST['id'])) {
    $sabor = $_POST['sabor'];
    $tamanho = $_POST['tamanho'];
    $preco = (float) $_POST['preco']; // Garante que o preço seja numérico

    $pizza = new Pizza($_POST['id'], $sabor, $tamanho, $preco);
    $dao->update($pizza);

    header("Location: index.php");
    exit();
} else if(isset($_POST['sabor']) && isset($_POST['tamanho']) && isset($_POST['preco']))
{
    $sabor = $_POST['sabor'];
    $tamanho = $_POST['tamanho'];
    $preco = (float) $_POST['preco']; // Converte para float

    $pizza = new Pizza(null, $sabor, $tamanho, $preco);
    $dao->create($pizza);

    header("Location: index.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pizza ? "Editar Pizza" : "Cadastrar Nova Pizza" ?></title>
</head>
<body>
    <h2><?= $pizza ? "Editar Pizza" : "Cadastrar Nova Pizza" ?></h2>

    <form action="pizza_form.php" method="post">
        <?php if ($pizza): ?>
            <input type="hidden" name="id" value="<?= $pizza->getId() ?>">
        <?php endif; ?>

        <label>Sabor:</label>
        <input type="text" name="sabor" required value="<?= $pizza ? $pizza->getSabor() : '' ?>"><br>

        <label>Tamanho:</label>
        <input type="text" name="tamanho" required value="<?= $pizza ? $pizza->getTamanho() : '' ?>"><br>

        <label>Preço:</label>
        <input type="number" name="preco" required value="<?= $pizza ? $pizza->getPreco() : '' ?>" "><br>

        <button type="submit">Salvar</button>
        <a href="index.php">Cancelar</a>
    </form>
</body>
</html>
