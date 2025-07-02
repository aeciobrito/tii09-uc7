<?php
session_start();
$isLogged = isset($_SESSION['token']);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css"> 
    <title>Gestão Hospitalar</title>
</head>
<body>
    <!-- Header Principal -->
    <!-- <header class="header-main">
        <div class="container">
            <div class="header-content">
                <h1 class="logo">Sistema de Gestão Hospitalar</h1>
                <nav class="nav-auth">
                    <ul class="nav-list">
                        <?php if($isLogged): ?>
                            <li><a href="index.php" class="nav-link">Home</a></li>
                            <li><a href="./frontend/usuario.php" class="nav-link">Minha Conta</a></li>
                            <li><a href="./frontend/logout.php" class="nav-link btn-logout">Sair</a></li>
                        <?php else: ?>
                            <li><a href="index.php" class="nav-link">Home</a></li>
                            <li><a href="./frontend/login.php" class="nav-link btn-login">Login</a></li>
                            <li><a href="./frontend/cadastro.php" class="nav-link btn-register">Cadastrar-se</a></li>
                        <?php endif; ?>
                    </ul>
                </nav>
            </div>
        </div>
    </header> -->

    <!-- Conteúdo Principal -->
    <main class="main-content">
        <div class="container">
            <div class="section">
                <div class="login-card">
                    <h2 class="welcome-title">Bem-vindo ao Sistema de Gestão Hospitalar</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus totam, esse impedit aliquid ipsa fugiat suscipit repellendus nesciunt neque tenetur corporis placeat soluta laudantium accusamus aspernatur atque temporibus sed non.</p>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Repellat dignissimos nam dicta maxime reprehenderit incidunt ullam tenetur ut modi perferendis itaque facilis ipsum nemo est consequatur, explicabo quo dolorem! Ipsum!</p>     
                </div>
               <?php if ($isLogged): ?>

                <!-- Área para usuários logados -->
                <section class="login-prompt">
                        <div class="login-card">
                            <h3>Acesso de administrador</h3>
                            <p>Você logado para acessar o sistema.</p>
                            <div class="action-buttons">
                                <a href="index.php" class="btn btn-primary">Home</a>
                                <a href="./frontend/login.php" class="btn btn-primary">Fazer Login</a>
                                <a href="./frontend/cadastro.php" class="btn btn-secondary">Criar Conta</a>
                                <a href="./frontend/logout.php" class="btn btn-secondary">Sair</a>
                            </div>
                        </div>
                    </section>   
                    

                <!-- Cadastros -->
                <section class="login-prompt">
                    <div class="login-card">
                        <h3>Cadastros</h3>
                        <p>Área de cadastro no sistema.</p>
                            <div class="action-buttons">
                                <a href="./frontend/form_paciente.php" class="btn btn-primary">Cadastro de Pacientes</a>
                                <a href="./frontend/form_convenio.php" class="btn btn-primary">Cadastro de Convênios</a>
                                <a href="./frontend/form_medicos.php" class="btn btn-secondary">Cadastro de Médicos</a>
                                <a href="./frontend/form_consultas.php" class="btn btn-secondary">Cadastro de Consultas</a>
                                <a href="./frontend/form_endereco.php" class="btn btn-secondary">Cadastro de Endereços</a>
                            </div>
                    </div>
                </section>   

                <!-- Listas -->
                <section class="login-prompt">
                    <div class="login-card">
                        <h3>Listas</h3>
                        <p>Área de listagem no sistema.</p>
                            <div class="action-buttons">
                                <a href="./frontend/lista_paciente.php" class="btn btn-primary">Lista de Pacientes</a>
                                <a href="./frontend/lista_convenio.php" class="btn btn-primary">Lista de Convênios</a>
                                <a href="./frontend/lista_medicos.php" class="btn btn-secondary">Lista de Médicos</a>
                                <a href="./frontend/lista_consultas.php" class="btn btn-secondary">Lista de Consultas</a>
                                <a href="./frontend/lista_endereco.php" class="btn btn-secondary">Lista de Endereços</a>
                            </div>
                    </div>
                </section>   

                <?php else: ?>
                
                <!-- Área para usuários não logados -->
                <section class="login-prompt">
                        <div class="login-card">
                            <h3>Acesso Restrito</h3>
                            <p>Você precisa estar logado para acessar o sistema.</p>
                            <div class="action-buttons">
                                <a href="index.php" class="btn btn-primary">Home</a>
                                <a href="./frontend/login.php" class="btn btn-primary">Fazer Login</a>
                                <a href="./frontend/cadastro.php" class="btn btn-secondary">Criar Conta</a>
                            </div>
                        </div>
                    </section>   
                <?php endif; ?>
            </div>
        </div>
    </main>

     <main class="main-content">
        <div class="container">
            <div class="welcome-section">
                <!-- Footer -->
                <footer class="content">
                    <div class="container">
                        <p class="footer-text">&copy; 2024 Sistema de Gestão Hospitalar. Todos os direitos reservados.</p>
                    </div>
                </footer>
            </div>          
        </div>          
    </div>          
    
</body>
</html>