<?php
require_once '../backend/Model/Consulta.php';
require_once '../backend/DAO/PacienteDAO.php';
require_once '../backend/DAO/MedicoDAO.php';
require_once '../backend/DAO/ConsultaDAO.php';

$dao= new ConsultaDAO;
$pacienteDao= new PacienteDAO();
$medicoDao = new MedicoDAO();

$pacientes= $pacienteDao->getAll();
$medicos= $medicoDao->getAll();

$consultas=null;

if(isset($_GET['id'])){
    $consultas= $dao->getById($_GET['id']);
}

if($_POST){
    $id =filter_input(INPUT_POST,'id')?? null;     
    $data =filter_input(INPUT_POST,'data'); 
    $horas =filter_input(INPUT_POST,'horas');  
    $especialidade =filter_input(INPUT_POST,'especialidade');  
    $paciente_id =filter_input(INPUT_POST,'paciente_id'); 
    $medico_id =filter_input(INPUT_POST,'medico_id'); 

    $consultas = new Consultas($id,$data,$horas,$especialidade,$paciente_id,$medico_id);
    if($id){
        $dao->update($consultas);
    }else{
        $dao->create($consultas);
        header("location:form_consultas.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Consultas</title>
     <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <div class="container">
    <header>
        <h1><?=$consultas?"Editar  Consultas":"Cadastro de Consultas"?></h1>
        <nav>
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="form_paciente.php">Cadastro de Pacientes</a></li>
                <li><a href="form_convenio.php">Cadastro Convenios</a></li>
                <li><a href="lista_convenio.php">Lista Convenios</a></li>
                <li><a href="form_endereco.php">Cadastro Endereços</a></li>
                <li><a href="form_medicos.php">Cadastrar Medico</a></li>
                <li><a href="form_consultas.php">Cadastro Consultas</a></li>
                <li><a href="lista_consultas.php">Lista Consultas</a></li>
            </ul>
        </nav>
    </header>
    <div class="container">
        <form action="form_consultas.php" method="post" >
            <?php if($consultas) :?>
                <input type="hidden" name="id" value="<?=$consultas->getId()?>">
            <?php endif; ?>
    <div>
        <label for="data">Data da Consulta :</label>
        <input type="date" name="data" id="data" required value="<?=$consultas?$consultas->getData():''?>">
    </div>
    <div>
        <label for="horas">Horário:</label>
        <input type="text" name="horas" id="horas" required value="<?=$consultas?$consultas->getHoras():''?>">
    </div>
    <div>
        <label for="especialidade">Especialidade:</label>
        <input type="text" name="especialidade" id="especialidade" required value="<?=$consultas?$consultas->getEspecialidade():''?>">
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
    <p>Lista de Médicos</p>
    <div>
        <select name="medico_id" id="medico_id">
            <option></option>
                <?php foreach($medicos as $medico):?>
                    <option value="<?=$medico->getId()?>"><?=$medico->getNome()?></option>
                <?php endforeach;?>
            </select>
        </div>
        <button type="submit">Cadastrar</button>
    </form>
</div>
</div>
    
</body>
</html>