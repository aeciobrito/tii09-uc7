<?php
require_once '../backend/DAO/ConvenioDAO.php';

$dao = new ConvenioDAO();
$convenios = $dao->getAll();

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Pacientes</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
       <header>
  <h1>Lista de pacientes</h1>
  <nav>
    <ul>
        <li><a href="../index.php">Home</a></li>
        <li><a href="form_paciente.php">Cadastro de Pacientes</a></li>
        <li><a href="form_convenio.php">Cadastro Convenios</a></li>
        <li><a href="lista_convenio.php">Lista Convenios</a></li>
         <li><a href="form_endereco.php">Cadastro Endereços</a></li>
          <li><a href="form_medicos.php">Cadastrar Medicos</a></li>
           <li><a href="form_consultas.php">Cadastro Consultas</a></li>
    </ul>
  </nav>
    </header>
    <table border="1">
        <tr>
            <th>Id:</th>
            <th>Empresa:</th>
            <th>Cnpj:</th>
            <th>Telefone</th>
            <th>Email:</th>
            <th>Paciente:</th>
            <th>Ação</th>
             <th>Ação</th>
        </tr>
   
    <?php foreach ($convenios as $convenio): ?>
        <tr>
            <td><?= $convenio->getId() ?></td>
            <td><?= $convenio->getEmpresa() ?></td>
            <td><?= $convenio->getCnpj() ?></td>
              <td><?= $convenio->getTelefone() ?></td>
            <td><?= $convenio->getEmail() ?></td>
              <td><?= $convenio->getPaciente_id() ?></td>
            
            <td><a href="form_convenio.php?id=<?=$convenio->getId()?>">Alterar</a></td>
            <td><a href="../backend/excluirConvenio.php?id=<?=$convenio->getId()?>">Excluir</a></td>
        </tr>
    <?php endforeach; ?>
     </table>
</body>
</html>