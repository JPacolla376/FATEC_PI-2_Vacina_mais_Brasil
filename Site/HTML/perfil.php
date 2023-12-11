<?php
require_once("../PHP/header.php");
require_once("../PHP/usuario.php");
$user = new Usuario();

if ($_SESSION['usuario'] == 'Governo Federal') {
    header("location: index.php");
    exit;
}

$nvsenha = isset($_POST['nvsenha']) ? $_POST['nvsenha'] : "";
$confirmsenha = isset($_POST['confirmsenha']) ? $_POST['confirmsenha'] : "";

$user->mostrarUsuario($_SESSION['usuario']);

if ($nvsenha == $confirmsenha && !empty($nvsenha) && !empty($confirmsenha)) {
    $user->atualizarSenha($_SESSION['cpf'], $nvsenha);
    $user->mostrarUsuario($_SESSION['usuario']);
}
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
        <link rel="stylesheet" type="text/css" href="../CSS/perfil.css">
        <title>Perfil</title>
    </head>
    <body>
        <!-- CABEÇALHO -->
        <header>
            <nav class="navbar navbar-expand-md navbar-light fixed-top navbar-tranparente">
                <div class="container">
                    <a href="index.php" class="navbar-brand">
                        <img src="../IMAGENS/logo.png" width="250">
                    </a>
                    <button class="navbar-toggler" data-toggle="collapse" data-target="#nav-principal">  
                        <i class="fas fa-bars text-white"></i>
                    </button>
                    
                    <div class="collapse navbar-collapse" id="nav-principal">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a href="../HTML/index.php" class="nav-link">INÍCIO</a>
                            </li>
                            
                            <li class="nav-item">
                                <a href="../HTML/minhasvacinas.php" class="nav-link">MINHAS VACINAS</a>
                            </li>  
                            <li class="nav-item">
                                <a href="../HTML/index.php#acessar" id="scroll-link-perfil" class="nav-link">CONTEÚDO</a>
                            </li>
                            <li class="nav-item">
                                <a href="../HTML/perfil.php" class="nav-link"><?php echo $_SESSION["usuario"]; ?></a>
                            </li>
                            <li class="nav-item">
                                <a href="../HTML/sobre.php" class="nav-link">SOBRE NÓS</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        <section class="py-5 my-5">
            <div class="container">
                <div class="bg-white shadow rounded-lg d-block d-sm-flex">
                    <div class="profile-tab-nav border-right">
                        <div class="p-4">
                            <div class="img-circle text-center mb-3">
                                <label>
                                    <p><strong>Olá,</strong></p>
                                </label>
                            </div>                                                   
                            <h4 class="text-center"><?php echo $_SESSION["usuario"]; ?></h4>
                        </div>
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link active" id="account-tab" data-toggle="pill" href="#account" role="tab" aria-controls="account" aria-selected="true">
                                <i class="fa fa-home text-center mr-1"></i>
                                Conta
                            </a>
                            <a class="nav-link" id="password-tab" data-toggle="pill" href="#password" role="tab" aria-controls="password" aria-selected="false">
                                <i class="fa fa-key text-center mr-1"></i>
                                Senha
                            </a>
                            <a class="nav-link" id="Notification-tab" data-toggle="pill" href="#Notification" role="tab" aria-controls="Notification"  aria-selected="false">
                                <i class="fa fa-bell text-center mr-1"></i>
                                Notificação
                            </a>  
                        </div>
                    </div>
                    <div class="tab-content p-4 p-md-5" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="account-tab">
                            <h3 class="mb-4">Configurações de Conta</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nome Completo</label>
                                        <input type="text" readonly class="form-control" value="<?php echo $_SESSION["usuario"]; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" readonly class="form-control" value="<?php echo $_SESSION["email"]; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>CPF</label>
                                        <input type="text" readonly class="form-control" value="<?php echo $_SESSION["cpf"]; ?>">
                                    </div>
                                </div>
                                <form action="../PHP/sair.php" method="post" class="mx-auto">
                                    <button class="btn btn-light" >Sair da Conta</button>
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="password" role="tabpanel" aria-labelleby="password-tab">
                            <h3 class="mb-4">Configurações de senha</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Senha Atual</label>
                                        <input type="password" class="form-control" readonly value="<?php echo $_SESSION["senha"]; ?>">
                                    </div>
                                </div>
                            </div>
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <i class="bi bi-eye-fill" id="btn-senha-nova" onclick="mostrarSenha('senha-nova')"></i>
                                            <label>Nova Senha</label>
                                            <input type="password" class="form-control" id="senha-nova" name="nvsenha">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <i class="bi bi-eye-fill" id="btn-senha-confirmada" onclick="mostrarSenha('senha-confirmada')"></i>
                                            <label>Confirme a Senha</label>
                                            <input type="password" class="form-control" id="senha-confirmada" name="confirmsenha">
                                        </div>
                                    </div>
                                </div>                        
                                <div>
                                    <button class="btn btn-primary">Salvar</button>
                                    <button class="btn btn-light">Cancelar</button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="Notification" role="tabpanel" aria-labelledby="Notification-tab">
                            <h3 class="mb-4">Configurações de notificação</h3>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="Notification1">
                                    <label class="form-check-label" for="Notification1">
                                        Ative as notificações agora mesmo para receber em tempo real as próximas vacinas a serem aplicadas.
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="Notification2">
                                    <label class="form-check-label" for="Notification2">Avisos de Campanhas de Vacinação: Ative para sua Proteção!</label>
                                </div>
                            </div>
                            <div>
                                <button class="btn btn-primary">Salvar</button>
                                <button class="btn btn-light">Cancelar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script src="../JAVASCRIPT/index.js"></script>
    </body>
</html>