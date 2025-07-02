<?php
require_once '../backend/DAO/MedicoDAO.php';


$dao= new MedicoDAO();



$medico=null;

if(isset($_GET['id'])){
$medico= $dao->getById($_GET['id']);
}



if($_POST){
$id =filter_input(INPUT_POST,'id')??null;     
$nome =filter_input(INPUT_POST,'nome');  
$especialidade =filter_input(INPUT_POST,'especialidade');  
$crm =filter_input(INPUT_POST,'crm');  


$medico = new Medicos($id,$nome,$especialidade,$crm,$email);
if($id){
$dao->update($medico);
}else{
$dao->create($medico);
header("location:form_medicos.php");
exit;
}
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Médicos</title>
     <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <header>
  <h1><?=$medico?"Editar  Médicos":"Cadastro de Médicos"?></h1>
  <nav>
    <ul>
        <li><a href="../index.php">Home</a></li>
        <li><a href="form_paciente.php">Cadastro de Pacientes</a></li>
        <li><a href="form_convenio.php">Cadastro Convenios</a></li>
         <li><a href="form_endereco.php">Cadastro Endereços</a></li>
        <li><a href="form_medicos.php">Cadastrar Medicos</a></li>
        <li><a href="lista_medicos.php">Lista Medicos</a></li>
         <li><a href="form_consultas.php">Cadastro Consultas</a></li>
    </ul>
  </nav>
    </header>
    <form action="form_medicos.php" method="post">
        <?php if($medico) :?>
         <input type="hidden" name="id" value="<?=$medico->getId()?>">
          <?php endif; ?>
    <div>
        <label for="nome">Nome :</label>
        <input type="text" name="nome" id="nome" required value="<?=$medico?$medico->getNome():''?>">
    </div>

        <div>
        <label for="especialidade">Especialidade:</label>
        <input type="text" name="especialidade" id="especialidade" required value="<?=$medico?$medico->getEspecialidade():''?>">
    </div>
        <div>
        <label for="crm">Crm :</label>
        <input type="text" name="crm" id="crm" required value="<?=$medico?$medico->getCrm():''?>">
    </div>
    <button type="submit">Cadastrar</button>
    </form>
</body>
</html>