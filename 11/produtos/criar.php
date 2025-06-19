<?php
require_once __DIR__ . '/../model/Produto.php';
require_once __DIR__ . '/../dao/ProdutoDAO.php';

session_start();

if(!isset($_SESSION['token']))
{
    header('Location: ../login.php');
    exit();
}

if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $nome = $_POST['nome'] ?? '';
    $preco = $_POST['preco'] ?? 0;
    $ativo = isset($_POST['ativo']) ? true : false;
    $validade = $_POST['dataDeValidade'] ?? '';
    $cadastro = date('Y-m-d');

    $produto = new Produto(null, $nome, $preco, $ativo, $cadastro, $validade);
    $dao = new ProdutoDAO();
    $dao->create($produto);    
    header('Location: listar.php');
    exit();
}

?>
<h1>Criar Produto</h1>

<form method="post">
    Nome: <input type="text" name="nome" required><br>
    Preço: <input type="number" name="preco" step="0.01" required><br>
    Ativo: <input type="checkbox" name="ativo" checked><br>
    Validade: <input type="date" name="dataDeValidade"><br>
    <button type="submit">Salvar</button>
</form>