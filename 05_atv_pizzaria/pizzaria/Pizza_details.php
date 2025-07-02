<?php // Início do código PHP

require_once 'PizzaDAO.php'; // Importa o arquivo 'PizzaDAO.php', que contém a classe responsável por acessar os dados das pizzas no banco de dados.

if(!isset($_GET['id'])) // Verifica se o parâmetro 'id' foi passado na URL via método GET.
{
    echo "ID do contato não fornecido!"; // Exibe uma mensagem de erro caso o ID não tenha sido informado.
    exit(); // Encerra a execução do script imediatamente.
}

$dao = new PizzaDAO(); // Cria uma nova instância da classe PizzaDAO para manipular os dados das pizzas.
$pizza = $dao->getById($_GET['id']); // Utiliza o método getById() da classe DAO para buscar a pizza com o ID fornecido.

if(!$pizza) // Verifica se o resultado da busca foi vazio (ou seja, pizza não encontrada).
{
    echo "Pizza não encontrado no Sistema!"; // Exibe mensagem de erro indicando que a pizza não foi localizada.
    exit(); // Encerra a execução do script.
}
?>

<!DOCTYPE html> <!-- Declara o tipo do documento como HTML5 -->
<html lang="pt-br"> <!-- Inicia o documento HTML e define o idioma como português do Brasil -->
<head> <!-- Início do cabeçalho da página -->
    <meta charset="UTF-8"> <!-- Define o conjunto de caracteres como UTF-8 para suportar acentuação -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Faz com que a página seja responsiva em dispositivos móveis -->
    <title>Detalhes  da Pizza </title> <!-- Define o título da aba do navegador -->
</head> <!-- Fim do cabeçalho -->

<body> <!-- Início do corpo da página -->
    <h2>Detalhes da Pizza</h2> <!-- Título de nível 2 da página -->

    <p><strong>ID: </strong><?= $pizza->getId() ?></p> <!-- Exibe o ID da pizza obtido via método getId() -->
    <p><strong>Sabor: </strong><?= $pizza->getSabor() ?></p> <!-- Exibe o sabor da pizza obtido via método getSabor() -->
    <p><strong>Tamanho: </strong><?= $pizza->getTamanho() ?></p> <!-- Exibe o tamanho da pizza via método getTamanho() -->
    <p><strong>Preço: </strong><?= $pizza->getPreco() ?></p> <!-- Exibe o preço da pizza via método getPreco() -->

    <br> <!-- Adiciona uma quebra de linha -->

    <a href="index.php">Voltar</a> <!-- Link que leva o usuário de volta à página principal -->
</body> <!-- Fim do corpo da página -->
</html> <!-- Fim do documento HTML -->
