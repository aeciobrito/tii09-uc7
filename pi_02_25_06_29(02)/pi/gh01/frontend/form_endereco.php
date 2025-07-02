<?php
require_once '../backend/DAO/EnderecoDAO.php';
require_once '../backend/DAO/PacienteDAO.php';

$dao= new EnderecoDAO();
$pacienteDao= new PacienteDAO();
$pacientes =$pacienteDao->getAll();
$endereco=null;

if(isset($_GET['id'])){
$endereco= $dao->getById($_GET['id']);
}



if($_POST){
$id = $_POST['id'] ?? null;    
$logradouro = $_POST['logradouro'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
$paciente_id = $_POST['paciente_id'];

$endereco =new Endereco($id,$logradouro,$bairro,$cidade,$estado,$paciente_id);
if($id){
$dao->update($endereco);
}else{
$dao->create($endereco);
header("location:form_endereco.php");
exit;
}
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Endereços</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
  <h1><?=$endereco?"Editar  Endereços":"Cadastro de Endereços"?></h1>
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
    <form action="form_endereco.php" method="post">
        <?php if($endereco) :?>
         <input type="hidden" name="id" value="<?=$endereco->getId()?>">
          <?php endif; ?>
    <div>
        <label for="logradouro">Logradouo :</label>
        <input type="text" name="logradouro" id="logradouro" required value="<?=$endereco?$endereco->getLogradouro():''?>">
    </div>

        <div>
        <label for="bairro">Bairro :</label>
        <input type="text" name="bairro" id="bairro" required value="<?=$endereco?$endereco->getBairro():''?>">
    </div>
        <div>
        <label for="cidade">Cidade :</label>
        <input type="text" name="cidade" id="cidade" required value="<?=$endereco?$endereco->getCidade():''?>">
    </div>
       <div>
        <div>
        <label for="estado">Estado :</label>
        <input type="text" name="estado" id="estado" required value="<?=$endereco?$endereco->getEstado():''?>">
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