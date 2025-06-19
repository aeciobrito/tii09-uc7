<?php
require_once __DIR__ . '/../model/Produto.php';
require_once __DIR__ . '/../dao/ProdutoDAO.php';

session_start();

if(!isset($_SESSION['token']))
{
    header('Location: ../login.php');
    exit();
}

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$dao = new ProdutoDAO();
if($dao->delete($id))
{
    header('Location: listar.php');
    exit();
}