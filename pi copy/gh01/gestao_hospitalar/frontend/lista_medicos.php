<?php
require_once '../backend/DAO/MedicoDAO.php';

$dao = new MedicoDAO();
$medicos = $dao->getAll();

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Medicos</title>
     <link rel="stylesheet" href="css/estilo.css">
</head>

<body>
       <header>
  <h1>Lista de Medicos</h1>
  <nav>
    <ul>
        <li><a href="../index.php">Home</a></li>
        <li><a href="form_paciente.php">Cadastro de Pacientes</a></li>
        <li><a href="form_convenio.php">Cadastro Convenios</a></li>
         <li><a href="form_endereco.php">Cadastro Endereços</a></li>
        <li><a href="form_medicos.php">Cadastrar Medicos</a></li>
        <li><a href="lista_medicos.php">Lista Medicos</a></li>
        <li><a href="form_consultas.php">Cadastro Consulta</a></li>
    </ul>
  </nav>
    </header>
    <table border="1">
        <tr>
            <th>Id:</th>
            <th>Nome:</th>
            <th>Especialidade:</th>
            <th>Crm</th>
            <th>Ação</th>
             <th>Ação</th>
        </tr>
   
    <?php foreach ($medicos as $medico): ?>
        <tr>
            <td><?= $medico->getId() ?></td>
            <td><?= $medico->getNome() ?></td>
            <td><?= $medico->getEspecialidade() ?></td>
            <td><?= $medico->getCrm() ?></td>
          
            
            <td><a href="form_medicos.php?id=<?=$medico->getId()?>">Alterar</a></td>
            <td><a class="excluir" href="../backend/excluirMdicos.php?id=<?=$medico->getId()?>">Excluir</a></td>
        </tr>
    <?php endforeach; ?>
     </table>
    <script src="js/confirm.js"></script>
</body>
</html>