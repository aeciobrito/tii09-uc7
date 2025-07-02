<?php
session_start();
require_once '../backend/DAO/UsuarioDAO.php';
require_once '../backend/Model/Usuario.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Dados do formulário
    $nome = filter_input(INPUT_POST, 'nome');
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $senha = filter_input(INPUT_POST, 'senha');
    $confirmaSenha = filter_input(INPUT_POST, 'confirmaSenha'); // Corrigido nome do campo

    if (!$nome || !$email || !$senha || $senha !== $confirmaSenha) {
        $erro = "Dados inválidos ou senhas não conferem.";
    } else {
        $dao = new UsuarioDAO();

        if ($dao->getByEmail($email)) {
            $erro = "E-mail já cadastrado.";
        } else {
            $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
            $token = bin2hex(random_bytes(25)); // Mantido para sessões futuras

            // Supondo a ordem correta dos parâmetros: (id, nome, email, senha, token)
            $usuario = new Usuario(null, $nome, $email, $senhaHash, $token);

            if ($dao->create($usuario)) {
                $_SESSION['token'] = $token;
                header('Location: index.php');
                exit;
            } else {
                $erro = "Cadastrado com sucesso.";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <!-- <h1>Cadastrar</h1> -->
    <?php if (isset($erro)) echo "<p style='color: red;'>$erro</p>"; ?>
    <form method="POST">
        <div>
            <h1>Cadastrar</h1>
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" required>
        </div>
        <div>
            <label for="email">E-mail:</label>
            <input type="email" name="email" id="email" required>
        </div>
        <div>
            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="senha" required>
        </div>
        <div>
            <label for="confirmaSenha">Confirmar Senha:</label>
            <input type="password" name="confirmaSenha" id="confirmaSenha" required>
        </div>
        <button type="submit">Cadastrar</button>
    </form>
    <a href="login.php">Já tem conta?</a>
</body>
</html>


           