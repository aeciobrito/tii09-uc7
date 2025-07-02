<?php
session_start();
require_once '../dao/UsuarioDAO.php';

//  checa se a sessão está ativa se não sai 
if(!isset($_SESSION['token']))
{
    header('Location: index.php');
    exit();
}

?>

<H1>Protegida!</H1>

<a href="index.php">voltar</a>