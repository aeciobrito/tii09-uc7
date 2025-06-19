<?php
require_once __DIR__ . '/../model/Produto.php';
require_once __DIR__ . '/../dao/ProdutoDAO.php';

session_start();

if(!isset($_SESSION['token']))
{
    header('Location: ../login.php');
    exit();
}

$id = (int)filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$dao = new ProdutoDAO();
$produto = $dao->getById($id);

if(!$produto) exit("Produto não encontrado!");

if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $id = $_POST['id'];
    $nome = $_POST['nome'] ?? '';
    $preco = $_POST['preco'] ?? 0;
    $ativo = isset($_POST['ativo']) ? true : false;
    $validade = $_POST['dataDeValidade'] ?? '';
    $cadastro = date('Y-m-d');

    $produtoAtualizado = new Produto($id, $nome, $preco, $ativo, $cadastro, $validade);
    
    $dao->update($produtoAtualizado);  
    header('Location: listar.php');
    exit();
}

?>
<h1>Editar Produto</h1>

<form method="post">
    <input hidden type="number" name="id" value="<?= $produto->getId() ?>">
    Nome: <input type="text" name="nome" required><br>
    Preço: <input type="number" name="preco" step="0.01" required><br>
    Ativo: <input type="checkbox" name="ativo" checked><br>
    Validade: <input type="date" name="dataDeValidade"><br>
    <button type="submit">Salvar</button>
</form>