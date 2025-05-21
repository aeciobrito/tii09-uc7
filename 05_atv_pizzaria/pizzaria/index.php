<?php // Início do bloco PHP

require 'PizzaDAO.php'; // Importa o arquivo que contém a classe PizzaDAO, responsável pelo acesso aos dados das pizzas

$bd = new PizzaDAO(); // Cria uma nova instância do objeto PizzaDAO
$pizzas = $bd->getAll(); // Chama o método getAll() para recuperar todas as pizzas do banco de dados e armazena o resultado na variável $pizzas

?> <!-- Fim do bloco PHP -->

<!DOCTYPE html> <!-- Declara que o documento está utilizando HTML5 -->
<html lang="pt-br"> <!-- Início do HTML com idioma definido como português do Brasil -->
<head> <!-- Início do cabeçalho -->
    <meta charset="UTF-8"> <!-- Define o conjunto de caracteres como UTF-8 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Torna a página responsiva para dispositivos móveis -->
    <title>Lista de Pizzas</title> <!-- Define o título da aba no navegador -->
    <link rel="stylesheet" href="styles.css">
</head> <!-- Fim do cabeçalho -->

<body> <!-- Início do corpo da página -->
    <h2>Pizzas para Todos - Lista de Pizzas</h2> <!-- Título principal da página -->

    <a href="Pizza_form.php">Cadastrar Nova</a> <!-- Link para adicionar uma nova pizza -->

    <table border="1" cellpading="5"> <!-- Cria uma tabela com borda de 1px e espaçamento interno (obs: o correto seria "cellpadding") -->
        <tr><th>ID</th><th>SABOR</th><th>TAMANHO</th><th>PREÇO</th><th>OPÇÕES</th></tr> <!-- Cabeçalho da tabela com os nomes das colunas -->
        
        <?php foreach ($pizzas as $p): ?> <!-- Início do loop que percorre todas as pizzas retornadas do banco -->
            <tr> <!-- Início de uma nova linha na tabela -->
                <td><?= $p->getId() ?></td> <!-- Exibe o ID da pizza -->
                <td><?= $p->getSabor() ?></td> <!-- Exibe o sabor da pizza -->
                <td><?= $p->getTamanho() ?></td> <!-- Exibe o tamanho da pizza -->
                <td><?= $p->getPreco() ?></td> <!-- Exibe o preço da pizza -->

                <td> <!-- Início da célula com links de ação -->
                    <a href="Pizza_details.php?id=<?= $p->getId() ?>">Detalhes</a> <!-- Link para ver detalhes da pizza -->
                    <a href="Pizza_form.php?id=<?= $p->getId() ?>">Editar</a> <!-- Link para editar os dados da pizza -->
                    <a href="Pizza_delete.php?id=<?= $p->getId() ?>">Excluir</a> <!-- Link para excluir a pizza -->
                </td> <!-- Fim da célula com ações -->
            </tr> <!-- Fim da linha da tabela -->
        <?php endforeach; ?> <!-- Fim do loop foreach -->
    </table> <!-- Fim da tabela -->

    <br> <!-- Quebra de linha -->

    

</body> <!-- Fim do corpo da página -->
</html> <!-- Fim do documento HTML -->
