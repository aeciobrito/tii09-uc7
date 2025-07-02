<?php
require_once '../backend/DAO/ConvenioDAO.php';
require_once '../backend/DAO/PacienteDAO.php';

$dao= new ConvenioDAO;
$pacienteDao= new PacienteDAO();

$pacientes= $pacienteDao->getAll();

$convenio=null;

if(isset($_GET[''])){
$convenio= $dao->getById($_GET['id']);
}



if($_POST){
$id = filter_input(INPUT_POST,'id')??null;   
$empresa = filter_input(INPUT_POST,'empresa');  
$cnpj =filter_input(INPUT_POST,'cnpj'); 
$telefone =filter_input(INPUT_POST,'telefone');  
$email = filter_input(INPUT_POST,'email');  
$paciente_id = filter_input(INPUT_POST,'paciente_id'); 

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
     <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <header>
  <h1><?=$convenio?"Editar  Convenio":"Cadastro de Convenios"?></h1>
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
    <form action="form_convenio.php" method="post">
        <?php if($convenio) :?>
         <input type="hidden" name="" value="<?=$convenio->getId()?>">
          <?php endif; ?>
    <div>
        <label for="empresa">Empresa :</label>
        <input type="text" name="empresa" ="empresa" required value="<?=$convenio?$convenio->getEmpresa():''?>">
    </div>

        <div>
        <label for="cnpj">Cnpj:</label>
        <input type="text" name="cnpj" ="cnpj" required value="<?=$convenio?$convenio->getCnpj():''?>">
    </div>
        <div>
        <label for="telefone">Telefone :</label>
        <input type="tel" name="telefone" ="telefone" required value="<?=$convenio?$convenio->getTelefone():''?>">
    </div>
    <div>
        <label for="email">Email :</label>
        <input type="email" name="email" ="email" required value="<?=$convenio?$convenio->getEmail():''?>">
    </div> 
      <p>Lista de Pacientes</p>
    <div>
        <select name="paciente_id" ="paciente_id">
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