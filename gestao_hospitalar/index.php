<?php
session_start();
$isLogged = isset($_SESSION['token']);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <title>Gestão Hospitalar</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <nav>
        <a href="index.php">Home</a>
        <?php if($isLogged):?>
       <a href="./frontend/usuario.php">Minha Conta</a>
        <a href="./frontend/logout.php">Sair</a>
          <?php else:?>
          <a href="./frontend/login.php">Login</a>
        <a href="./frontend/cadastro.php">Cadastra-se</a>
       <?php endif;?>
    </nav>
    
    <h1>Bem vindo ao Sistema de Gestão Hospitalar</h1>
    
    <?php if($isLogged): ?>
    <a href="./frontend/form_consultas.php">Cadastro de Consulta</a></br>
    <a href="./frontend/form_convenio.php">Cadastro de Convenio</a></br>
    <a href="./frontend/form_medicos.php">Cadastro de Médico</a></br>
    <a href="./frontend/form_paciente.php">Cadastro de Paciente</a></br>

    <a href="./frontend/lista_consultas.php">Listar Consultas</a></br>
    <a href="./frontend/lista_convenio.php">Listar Convenio</a></br>
    <a href="./frontend/lista_paciente.php">Listar Pacientes</a></br>
    <a href="./frontend/lista_medicos.php">Listar Médicos</a></br>
    
     <?php endif; ?>
</body>
</html>
      