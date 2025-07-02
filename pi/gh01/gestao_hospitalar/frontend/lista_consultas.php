<?php
require_once '../backend/DAO/ConsultaDAO.php';

$dao = new ConsultaDAO();
$consultas = $dao->getAll();

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Consutas</title>
     <link rel="stylesheet" href="css/estilo.css">
</head>

<body>
       <header>
  <h1>Lista de Consultas</h1>
  <nav>
    <ul>
        <li><a href="../index.php">Home</a></li>
        <li><a href="form_paciente.php">Cadastro de Pacientes</a></li>
        <li><a href="form_convenio.php">Cadastro Convenios</a></li>
        <li><a href="lista_convenio.php">Lista Convenios</a></li>
         <li><a href="form_endereco.php">Cadastro Endereços</a></li>
          <li><a href="form_medicos.php">Cadastrar Medicos</a></li>
           <li><a href="form_consultas.php">Cadastro Consultas</a></li>
          <li><a href="lista_consultas.php">Lista Consultas</a></li>
    </ul>
  </nav>
    </header>
    <table border="1">
        <tr>
            <th>Id:</th>
            <th>Data:</th>
            <th>Horas:</th>
            <th>Especialidade</th>
            <th>Paciente:</th>
            <th>Médico</th>
            <th>Ação</th>
             <th>Ação</th>
        </tr>
   
    <?php foreach ($consultas as $consulta): ?>
        <tr>
            <td><?= $consulta->getId() ?></td>
            <td><?= $consulta->getData() ?></td>
            <td><?= $consulta->getHoras() ?></td>
              <td><?= $consulta->getEspecialidade() ?></td>
            <td><?= $consulta->getPaciente_id() ?></td>
              <td><?= $consulta->getMedico_id() ?></td>
            
            <td><a href="form_consultas.php?id=<?=$consulta->getId()?>">Alterar</a></td>
            <td><a class="excluir" href="../backend/excluirConsultas.php?id=<?=$consulta->getId()?>">Excluir</a></td>
        </tr>
    <?php endforeach; ?>
     </table>
     <script src="js/confirm.js"></script>
</body>
</html>