<?php
session_status();
require_once '../UsuarioDAO.php';
require_once '../Usuario.php';

if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    // var_dump($_POST); // Adicionando esta linha para verificar os dados recebidos
    $nome = filter_input(INPUT_POST, 'nome');
    //$nome = $_POST['nome'];
    $email =  filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $senha = $_POST['senha'];
    $confirmSenha = $_POST['confirmSenha'];

    if($senha !== $confirmSenha || !$nome || !$email || !$senha )
    {
        $erro = "Dados inválidos: as senhas não conferem.";
    }
    else
    {
        $dao = new UsuarioDAO();
        if($dao->getByEmail($email))
        {
            $erro = "Email já cadastrado.";
        }        
        else
        {
            $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
            $token = bin2hex(random_bytes(25)); // gera token 
            $usuario =  new Usuario(null, $nome, $senhaHash, $email, $token);
            if($dao->create($usuario))
            {
                $_SESSION['token']=$token;
                header('Location: index.php');
                exit;
            }
            else
            {
                $erro = "Erro ao cadastrar usuário.";
            }
        }
    }
}

?>

<h1>Cadastro</h1>
<?php if(isset($erro)) echo $erro; ?>
<form method="POST">
    Nome: <input type="text" name="nome" required><br><br>
    Email: <input type="email" name="email" required><br><br>
    Senha: <input type="password" name="senha" required><br><br>
    Confirmar Senha: <input type="password" name="confirmSenha" required><br><br>

    <button type="submit">Cadastrar</button>

</form>

<a href="#">Já tem conta?</a>

<!-- // SELECT * FROM usuarios.usuario -->