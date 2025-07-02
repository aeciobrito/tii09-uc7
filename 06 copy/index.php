<?php

require_once 'ContatoDAO.php';
$dao = new ContatoDAO();
$contatos = $dao->getAll();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Contatos</title>
</head>
<body>
    <h2>Lista de Contatos</h2>

    <a href="contato_form.php">Cadastrar Contato</a><br>
    
    <table border="1" cellpadding="5">
        <tr>
            <th>Nome</th>
            <th>Telefone</th>
            <th>Ações</th>
        </tr>
        <?php foreach ($contatos as $c): ?>
            <tr>
                <td><?= $c->getNome() ?></td>
                <td><?= $c->getTelefone() ?></td>
                <td>
                    <a href="contato_details.php?id=<?= $c->getId() ?>">Detalhes</a>
                    <a href="#">Editar</a>
                    <a href="contato_delete.php?id=<?= $c->getId() ?>">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>