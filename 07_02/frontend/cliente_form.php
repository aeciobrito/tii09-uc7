<?php

require_once'../backend/ClienteDAO.php';
$dao = new ClienteDAO();
$cliente = null;

if (isset($_GET['id'])){
    $cliente = $dao->getById($_GET['id']);
}

if ($_POST) {
    $id = $_POST['id'] ?? null;
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $ativo = $_POST['ativo']? true: false ;
    $DataDeNascimento = $_POST['DataDeNascimento'];

    $cliente = new Cliente($id, $nome, $cpf, $ativo, $DataDeNascimento);

    if ($id) {
        $dao->update($cliente);
    } else {
        $dao->create($cliente);
    }

    header('Location: ../index.php');
    exit;
    
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $cliente ? 'Edição de Cliente' : 'Cadastro de Cliente'?></title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <h2><?= $cliente ? 'Editar Cliente'  : 'Cadastrar Cliente' ?></h2>

    <form action="cliente_form.php" method="post">
        <?php if ($cliente): ?>
            <input hidden name='id' require value='<?= $cliente->getId() ?>'>
        <?php endif; ?>

        <label>Nome:</label>
        <input type="text" name="nome" required value="<?= $cliente ? $cliente->getNome() : '' ?>"><br>

        <label>CPF:</label>
        <input type="text" name="cpf" required value="<?= $cliente ? $cliente->getCpf() : '' ?>"><br>

        <label>Ativo:</label>
        <input type="checkbox" name="ativo" value="1" <?= $cliente && $cliente->getAtivo() ? 'checked' : '' ?>><br>
      
        <label>Data de Nascimento:</label>
        <input type="date" name="DataDeNascimento" required value="<?= $cliente ? $cliente->getDataDeNascimento() : '' ?>"><br>

        <button type="submit">Salvar</button>
    </form>
    <a href="../index.php">Cancelar</a>
</body>
</html>

<!--
USE venda;
SELECT * FROM clientes; 
-->