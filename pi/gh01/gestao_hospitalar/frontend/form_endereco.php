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


if(isset($_POST['cadastrar'])){
if($_POST){
$id =filter_input(INPUT_POST,'id')??null; 
$logradouro =filter_input(INPUT_POST,'logradouro'); 
$bairro =filter_input(INPUT_POST,'bairro');  
$cidade =filter_input(INPUT_POST,'cidade'); 
$estado =filter_input(INPUT_POST,'estado');  
$paciente_id =filter_input(INPUT_POST,'paciente_id');  

$endereco =new Endereco($id,$logradouro,$bairro,$cidade,$estado,$paciente_id);
if($id){
$dao->update($endereco);
}else{
$dao->create($endereco);
header("location:form_endereco.php");
exit;
}
}
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Endereços</title>
     <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <header>
  <h1><?=$endereco?"Editar  Endereços":"Cadastro de Endereços"?></h1>
  <nav>
    <ul>
        <li><a href="../index.php">Home</a></li>
        <li><a href="form_paciente.php">Cadastro de Pacientes</a></li>
        <li><a href="form_convenio.php">Cadastro Convenios</a></li>
         <li><a href="form_endereco.php">Cadastro Endereços</a></li>
        <li><a href="lista_endereco.php">Lista Endereco</a></li>
          <li><a href="form_medicos.php">Cadastrar Medicos</a></li>
           <li><a href="form_consultas.php">Cadastro Consultas</a></li>
    </ul>
  </nav>
    </header>
    <form action="" method="post">

             <?php if($endereco) :?>
         <input type="hidden" name="id" value="<?=$endereco->getId()?>">
          <?php endif; ?>
               <div id="area-do-cep">
            <label for="cep">Informe o cep :<br><span id="status"></span></label>
            <input type="text" name="cep" id="cep" placeholder="Somente números" maxlength="9" inputmode="numeric" required>
            <button id="buscar">Buscar</button>
          </div>
    <div>
        <label for="logradouro">Logradouro :</label>
        <input type="text" name="logradouro" id="endereco" readonly value="<?=$endereco?$endereco->getLogradouro():''?>">
    </div>
        
        <div>
        <label for="bairro">Bairro :</label>
        <input type="text" name="bairro" id="bairro" readonly value="<?=$endereco?$endereco->getBairro():''?>">
    </div>
        <div>
        <label for="cidade">Cidade :</label>
        <input type="text" name="cidade" id="cidade" readonly value="<?=$endereco?$endereco->getCidade():''?>">
    </div>
       <div>
        <div>
        <label for="estado">Estado :</label>
        <input type="text" name="estado" id="estado" readonly value="<?=$endereco?$endereco->getEstado():''?>">
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
   
    <button type="submit"name="cadastrar">Cadastrar</button>
    </form>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Importação do plugin/extenção Jquery mask -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
     <script src="js/buscarCep.js"></script>
</body>
</html>