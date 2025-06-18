<?php
session_start();
require_once '../dao/UsuarioDAO.php';

if(!isset($_SESSION['token']))
{
    header('Location: index.php');
    exit();
}

$dao = new UsuarioDAO();
$user = $dao->getByToken($_SESSION['token']);

if(!$user)
{
    $_SESSION['token'] = null;
    header('Location: login.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista De Produtos</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <h1>Minha Conta</h1>

    <p>Nome: <?= $user->getNome() ?></p>
    <p>Email: <?= $user->getEmail() ?></p>
  

    <a href="index.php">Voltar</a></br></br>

</body>
</html>