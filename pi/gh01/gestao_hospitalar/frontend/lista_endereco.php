<?php
require_once '../backend/DAO/EnderecoDAO.php';

$dao = new EnderecoDAO();
$enderecos = $dao->getAll();

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Endereços</title>
     <link rel="stylesheet" href="css/estilo.css">
</head>

<body>
       <header>
  <h1>Lista de endereços</h1>
  <nav>
    <ul>
        <li><a href="../index.php">Home</a></li>
        <li><a href="form_paciente.php">Cadastro de Pacientes</a></li>
        <li><a href="form_convenio.php">Cadastro Convenios</a></li>
        <li><a href="form_endereco.php">Cadastro Endereços</a></li>
        <li><a href="lista_endereco.php">Lista Endereços</a></li>
          <li><a href="form_medicos.php">Cadastrar Medicos</a></li>
           <li><a href="form_consultas.php">Cadastro Consultas</a></li>
    </ul>
  </nav>
    </header>
    <table border="1">
        <tr>
            <th>Id:</th>
            <th>Logradouro:</th>
            <th>Bairro:</th>
            <th>Cidade</th>
            <th>Estado:</th>
            <th>Paciente:</th>
            <th>Ação</th>
             <th>Ação</th>
        </tr>
   
    <?php foreach ($enderecos as $endereco): ?>
        <tr>
            <td><?= $endereco->getId() ?></td>
            <td><?= $endereco->getLogradouro() ?></td>
            <td><?= $endereco->getBairro() ?></td>
            <td><?= $endereco->getCidade() ?></td>
            <td><?= $endereco->getEstado() ?></td>
            <td><?= $endereco->getPaciente_id() ?></td>
            
            <td><a href="form_endereco.php?id=<?=$endereco->getId()?>">Alterar</a></td>
            <td><a class="excluir" href="../backend/excluirEndereco.php?id=<?=$endereco->getId()?>">Excluir</a></td>
        </tr>
    <?php endforeach; ?>
     </table>
    <script src="js/confirm.js"></script>
</body>
</html>