<?php
session_start();
$isLogged = isset($_SESSION['token']);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css"> 
    <title>Gestão Hospitalar</title>
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
    
    <?php if ($isLogged): ?>

        <nav>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="./frontend/form_paciente.php">Cadastro de Paciente</a></li>
                <li><a href="./frontend/form_convenio.php">Cadastro de Convênios</a></li>
                <li><a href="./frontend/form_medicos.php">Cadastro de Médicos</a></li>
                <li><a href="./frontend/form_consultas.php">Cadastro de Consultas</a></a></li>
                
                <li><a href="./frontend/lista_paciente.php">Lista de Paciente</a></li>
                <li><a href="./frontend/lista_convenio.php">Lista de Convênios</a></li>
                <li><a href="./frontend/lista_medicos.php">Lista de Médicos</a></li>
                <li><a href="./frontend/lista_consultas.php">Lista de Consultas</a></li>

                <li><a href="./frontend/form_endereco.php">Cadastro Endereços</a></li>
                <li><a href="./frontend/lista_endereco.php">Lista de Endereços</a></li>
            </ul>
        </nav>

<?php else: ?>
    <!-- <p>Você precisa estar logado para acessar o cadastro de paciente.</p> -->
    <a href="login.php">Fazer login</a>
<?php endif; ?>

</body>
</html>
      