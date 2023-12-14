<?php
require_once("../PHP/usuario.php");

$user = new Usuario();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    
    $cpf = isset($_POST['cpf']) ? $_POST['cpf'] : "";
    $nome = isset($_POST['nome']) ? $_POST['nome'] : "";
    $data_nasc = isset($_POST['data_nasc']) ? $_POST['data_nasc'] : "";
    $email = isset($_POST['email']) ? $_POST['email'] : "";
    $senha = isset($_POST['senha']) ? $_POST['senha'] : "";
    $cpflog = isset($_POST['cpflog']) ? $_POST['cpflog'] : "";
    
    if (!empty($cpflog)) {
        if ($cpflog == '1234' && $senha == 'GovernoFederal') {
        $_SESSION['usuario'] = 'SAIR DA CONTA PROFISSIONAL';
        $_SESSION['status'] = true;
        header("location: index.php");
        } else {
            $user->login($cpflog, $senha);
        }
    } else {
        $_SERVER['status'] = false;
    }

    if (!empty($cpf)) {
        $user->cadastrar($cpf, $nome, $data_nasc, $email, $senha);
        $user->login($cpf, $senha);
    } 

    unset($cpf);
    unset($nome);
    unset($email);
    unset($senha);
    unset($idade);
    unset($cpflog);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../CSS/login.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body>
   <div class="wrapper">
        <span class="bg-animate"></span>
        <span class="bg-animate2"></span>
        <div class="form-box login">
            <h2 class="animation" style="--i:0; --j:21">Login</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="input-box animation" style="--i:1; --j:22">
                    <input type="text" name="cpflog" required>
                    <label>CPF</label>
                    <i class="bi bi-person-vcard"></i>
                </div>
                <div class="input-box animation" style="--i:2; --j:23">
                    <input type="password" id="password" name="senha" required>
                    <i class="bi bi-eye-fill" id="btn-senha" onclick="mostrarsenha()"></i>
                    <label>Senha</label>
                </div>                
                <button type="submit" class="btn animation" style="--i:3; --j:24">Entrar</button>
                <div class="forgot-password-link animation" style="--i:5; --j:26; margin-top: 20px;">
                    <p><a href="../HTML/recuperacao.php" id="forgot-password">Esqueceu a senha?</a></p>
                </div>
                <div class="logreg-link animation" style="--i:4; --j:25">
                    <p>Não tem uma conta?<a href="#" class="register-link">Clique aqui</a></p>
                </div>
            </form>
        </div>
        <div class="info-text login">
            <h2 class="animation"style="--i:0; --j:23">Bem-vindo de volta!</h2>
            <p class="animation"style="--i:1; --j:24">
                Estamos felizes em tê-lo conosco novamente. Faça o login para explorar seu espaço personalizado ao acesso de suas vacinas.
            </p>
        </div>
        <div class="form-box register">
            <h2 class="animation" style="--i:17; --j:0">Cadastro</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <div class="input-box animation" style="--i:18; --j:0">
                    <input type="text" name="nome" required>
                    <label>Nome</label>
                    <i class="bi bi-person"></i>
                </div>
                <div class="input-box animation" style="--i:18; --j:1">
                    <input type="text" name="cpf" required>
                    <label>CPF</label>
                    <i class="bi bi-person-vcard"></i>
                </div>
                <div class="input-box animation" style="--i:19; --j:2">
                    <input type="number" name="data_nasc" value="Ex: 1988-05-27" required>
                    <label>Data de Nascimento</label>
                    <i class="bi bi-person-fill-up"></i>
                </div>
                <div class="input-box animation"style="--i:20; --j:3">
                    <input type="text" name="email" required>
                    <label>E-mail</label>
                    <i class="bi bi-envelope-fill"></i>
                </div>
                <div class="input-box animation" style="--i:21; --j:4">
                    <input type="password" id="password2" name="senha" required>
                    <i class="bi bi-eye-fill" id="btn-senha2" onclick="mostrarsenha2()"></i>
                    <label>Senha</label>
                </div>
                <button type="submit" name="tipo_formato" class="btn animation"style="--i:23; --j:5">Salvar</button>
                <div class="logreg-link animation"style="--i:24; --j:6">
                    <p>Já possui uma conta?<a href="#" class="login-link">Clique aqui</a></p>
                </div>
            </form>
        </div>
        <div class="info-text register">
            <h2 class="animation"style="--i:17; --j:0">Não tem uma conta??</h2>
            <p class="animation"style="--i:18; --j:1"> Crie uma agora mesmo e descubra as possibilidades personalizadas esperando por você.</p>
        </div>
   </div>
   <script src="../JAVASCRIPT/login.js"></script>
</body>
</html>