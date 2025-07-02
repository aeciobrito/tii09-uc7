<?php
require_once '../backend/DAO/PacienteDAO.php';

$dao = new PacienteDAO();
$pacientes = $dao->getAll();

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
          <li><a href="form_consultas.php">Cadastro de Paciente</a></li>
          <li><a href="form_convenio.php">Cadastro de Convênios</a></li>
          <li><a href="form_medicos.php">Cadastro de Médicos</a></li>
          <li><a href="form_consultas.php">Cadastro de Consultas</a></a></li>
          
          <li><a href="lista_paciente.php">Lista de Paciente</a></li>
          <li><a href="lista_convenio.php">Lista de Convênios</a></li>
          <li><a href="lista_medicos.php">Lista de Médicos</a></li>
          <li><a href="lista_consultas.php">Lista de Consultas</a></li>

          <li><a href="form_endereco.php">Cadastro Endereços</a></li>
          <li><a href="lista_endereco.php">Lista de Endereços</a></li>
      </ul>
    </nav>
  </header>

  <table border="1">
        <tr>
            <th>Id:</th>
            <th>Nome:</th>
            <th>Sobrenome:</th>
            <th>DT nascimento</th>
            <th>Sexo:</th>
            <th>DT cadastro</th>
            <th>Ação</th>
             <th>Ação</th>
        </tr>
   
    <?php foreach ($pacientes as $paciente): ?>
        <tr>
            <td><?= $paciente->getId() ?></td>
            <td><?= $paciente->getNome() ?></td>
            <td><?= $paciente->getSobrenome() ?></td>
            <td><?= $paciente->getData_nascimento() ?></td>
              <td><?= $paciente->getSexo() ?></td>
            <td><?= $paciente->getData_cadastro() ?></td>
            <td><a href="form_paciente.php?id=<?=$paciente->getId()?>">Alterar</a></td>
              <td><a href="../backend/excluirPaciente.php?id=<?=$paciente->getId()?>">Excluir</a></td>
        </tr>
    <?php endforeach; ?>
  </table>
</body>
</html>