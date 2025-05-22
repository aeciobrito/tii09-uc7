<?php
// Início do script PHP

require_once 'PizzaDAO.php';
// Inclui o arquivo 'PizzaDAO.php', que contém a definição da classe PizzaDAO responsável pelas operações com o banco de dados relacionadas às pizzas.

if(!isset($_GET['id']))
// Verifica se o parâmetro 'id' foi passado via URL (método GET).
{
    echo "ID do contato não fornecido!";
    // Exibe uma mensagem de erro caso o 'id' não tenha sido fornecido.
    exit();
    // Encerra a execução do script para evitar que ele continue sem um ID válido.
}

$dao = new PizzaDAO();
// Cria uma nova instância da classe PizzaDAO para acessar os métodos de manipulação de dados da pizza.

$pizza = $dao->getById($_GET['id']);
// Chama o método getById da classe DAO para buscar a pizza no banco de dados com base no ID fornecido.

if(!$pizza)
// Verifica se a pizza foi encontrada (se o retorno foi falso ou nulo).
{
    echo "Pizza não encontrada no Sistema!";
    // Exibe uma mensagem de erro indicando que a pizza não foi localizada no banco.
    exit();
    // Encerra a execução do script, pois não há uma pizza válida para excluir.
}

$dao->delete($pizza->getId());
// Chama o método delete da classe DAO para excluir a pizza do banco de dados com base no ID recuperado.

header("Location: index.php");
// Redireciona o usuário para a página inicial (index.php) após a exclusão ser concluída com sucesso.

exit();
// Garante que o script termine a execução logo após o redirecionamento.

?>
