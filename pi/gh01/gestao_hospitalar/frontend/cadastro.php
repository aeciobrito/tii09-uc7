<?php
session_start();
require_once '../backend/DAO/UsuarioDAO.php';
require_once '../backend/Model/Usuario.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = filter_input(INPUT_POST, 'nome');
    $email = filter_input(INPUT_POST, 'email',FILTER_SANITIZE_EMAIL);
    $senha = filter_input(INPUT_POST, 'senha');
    $confirmaSenha = filter_input(INPUT_POST, 'confirmaSenha');

    if($senha !== $confirmaSenha ||!$nome || !$email ||!$senha){
     $rro = "Dados inválidos ou senha não conferem!";
    }else{
  $dao= new UsuarioDAO();

  if($dao->getByEmail($email)){
    
    $erro ="Já existe usuário com esse email!";
  }else{
    $senhaHash = password_hash($senha,PASSWORD_DEFAULT);

    $toke =bin2hex(random_bytes(25));
    
    $usuario = new Usuario(null,$nome,$email,$senhaHash,$toke);
    if($dao->create($usuario)){
        $_SESSION['token']==$token;
        header("location:../index.php");
    }else{
        $erro= "Erro ao cadastrar usuario";
    }
  }
}
}
?>
</body>
</html>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
<h1>Cadastrar</h1>
<?php if(isset($erro)) echo "<p style='color: red'>$erro</p>";?>
<form method="POST">
    <div>
        <label for="nome">Nome :</label>
        <input type="nome" name="nome" id="nome" required>
    </div>
    <div>
        <label for="email">Email :</label>
        <input type="email" name="email" id="email" required>
    </div>
        <div>
        <label for="senha">Senha :</label>
        <input type="password" name="senha" id="senha" required>
    </div>
    <div>
        <label for="confirmaSenha">Confirma Senha :</label>
        <input type="password" name="confirmaSenha" id="confirmaSenha" required>
    </div>
    <button type="submit">Cadastrar</button>  
</form>
<a href="login.php">Já tem conta</a>
</body>
</html>
    
