<?php
require_once '../backend/DAO/PacienteDAO.php';

$dao= new PacienteDAO();

$pacientes=null;

if(isset($_GET['id'])){
$pacientes= $dao->getById($_GET['id']);
}



if($_POST){
$id = $_POST['id'] ?? null;    
$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$data_nascimento = $_POST['data_nascimento'];
$sexo = $_POST['sexo'];
$data_cadastro = $_POST['data_cadastro'];

$pacientes =new Paciente($id,$nome,$sobrenome,$data_nascimento,$sexo,$data_cadastro);
if($id){
$dao->update($pacientes);
}else{
$dao->create($pacientes);
header("location:form_paciente.php");
exit;
}
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Pacientes</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
  <h1><?=$pacientes?"Editar  Pacientes":"Cadastro de Pacientes"?></h1>
  <nav>
    <ul>
        <li><a href="../index.php">Home</a></li>
        <li><a href="form_paciente.php">Cadastro de Pacientes</a></li>
        <li><a href="lista_paciente.php">Lista de Pacientes</a></li>
        <li><a href="form_convenio.php">Cadastro Convenios</a></li>
         <li><a href="form_endereco.php">Cadastro Endereços</a></li>
        <li><a href="form_medicos.php">Cadastrar Medicos</a></li>
         <li><a href="form_consultas.php">Cadastro Consultas</a></li>
    </ul>
  </nav>
    </header>
    <form action="form_paciente.php" method="post">
        <?php if($pacientes) :?>
         <input type="hidden" name="id" value="<?=$pacientes->getId()?>">
          <?php endif; ?>
    <div>
        <label for="nome">Nome :</label>
        <input type="nome" name="nome" id="nome" required value="<?=$pacientes?$pacientes->getNome():''?>">
    </div>

        <div>
        <label for="sobrenome">Sobrenome :</label>
        <input type="text" name="sobrenome" id="sobrenome" required value="<?=$pacientes?$pacientes->getSobrenome():''?>">
    </div>
        <div>
        <label for="sobrenome">Data de Nascimento :</label>
        <input type="date" name="data_nascimento" id="data_nascimento" required value="<?=$pacientes?$pacientes->getData_nascimento():''?>">
    </div>
    <div>
        <label for="sexo">Sexo :</label>
        <input type="radio" name="sexo" id="sexo" value="masculino">Masculino
         <input type="radio" name="sexo" id="sexo" value="feminino">Feminino
    </div>

      </div>
        <div>
        <label for="sobrenome">Data de Cadastro:</label>
        <input type="date" name="data_cadastro" id="data_cadastro" required value="<?=$pacientes?$pacientes->getData_cadastro():''?>">
    </div>
    <button type="submit">Cadastrar</button>
    </form>
</body>
</html>