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

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista De Produtos</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <H1>Protegida!</H1>

    <a href="index.php">voltar</a>

</body>
</html>