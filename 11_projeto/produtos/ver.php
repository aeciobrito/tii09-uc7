<!-- produto_details.php -->
 
<?php
require_once '../dao/ProdutoDAO.php';
$dao = new ProdutoDAO();

if(!isset($_GET['id'])) {
    header("Location: ../frontend/index.php");
    exit;
}

$produto = $dao->getById($_GET['id']);

if(!$produto) {
    echo "Produto não encontrado.";
    echo "<a href='../frontend/index.php'>Voltar</a>";
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styles.css">
</head>

<body>
    <h2>Detalhes do Produto</h2>
    <ul>
        <li><strong>ID: </strong><?= $produto->getId() ?></li>
        <li><strong>Nome: </strong><?= $produto->getNome() ?></li>
        <li><strong>Preço: </strong><?= $produto->getPreco() ?></li>
        <li><strong>Ativo: </strong><?= $produto->getAtivo() ? 'Sim' : 'Não' ?></li>
        <li><strong>Data de Cadastro: </strong><?= $produto->getDataDeCadastro() ?></li>
        <li><strong>Data de Validade: </strong><?= $produto->getDataDeValidade() ?></li>
    </ul>

    <a href="../frontend/index.php">Voltar</a>
    
</body>

</html>

