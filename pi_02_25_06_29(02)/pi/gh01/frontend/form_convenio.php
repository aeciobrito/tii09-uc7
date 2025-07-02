<?php
require_once '../backend/DAO/ConvenioDAO.php';
require_once '../backend/DAO/PacienteDAO.php';

$dao= new ConvenioDAO;
$pacienteDao= new PacienteDAO();

$pacientes= $pacienteDao->getAll();

$convenio=null;

if(isset($_GET['id'])){
$convenio= $dao->getById($_GET['id']);
}



if($_POST){
$id = $_POST['id'] ?? null;    
$empresa = $_POST['empresa'];
$cnpj = $_POST['cnpj'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$paciente_id =$_POST['paciente_id'];

$convenio = new Convenio($id,$empresa,$cnpj,$telefone,$email,$paciente_id);
if($id){
$dao->update($convenio);
}else{
$dao->create($convenio);
header("location:form_convenio.php");
exit;
}
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Convenio</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
  <h1><?=$convenio?"Editar  Convenio":"Cadastro de Convenios"?></h1>
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
    <form action="form_convenio.php" method="post">
        <?php if($convenio) :?>
         <input type="hidden" name="id" value="<?=$convenio->getId()?>">
          <?php endif; ?>
    <div>
        <label for="empresa">Empresa :</label>
        <input type="text" name="empresa" id="empresa" required value="<?=$convenio?$convenio->getEmpresa():''?>">
    </div>

    <div>
        <label for="cnpj">Cnpj:</label>
        <input type="text" name="cnpj" id="cnpj" required value="<?=$convenio?$convenio->getCnpj():''?>">
    </div>

    <div>
        <label for="telefone">Telefone :</label>
        <input type="text" name="telefone" id="telefone" required value="<?=$convenio?$convenio->getTelefone():''?>">
    </div>

    <div>
        <label for="email">Email :</label>
        <input type="email" name="email" id="email" required value="<?=$convenio?$convenio->getEmail():''?>">
    </div> 

    <p>Lista de Pacientes</p>
    <div>
        <select name="paciente_id" id="paciente_id">
            <option></option>
            <?php foreach($pacientes as $paciente):?>
             <option value="<?=$paciente->getId()?>"><?=$paciente->getNome()?></option>
               <?php endforeach;?>
        </select>
    </div>
    <button type="submit">Cadastrar</button>
    </form>

</body>
</html>