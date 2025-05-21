<?php

require_once 'PizzaDAO.php';

if(!isset($_GET['id']))
{
    echo "ID do contato não fornecido!";
    exit();
}

$dao = new PizzaDAO();
$contato = $dao->getById($_GET['id']);

if(!$contato)
{
    echo "Contato não encontrado no Sistema!";
    exit();
}

$dao->delete($contato->getId());

header("Location: index.php");
exit();

?>