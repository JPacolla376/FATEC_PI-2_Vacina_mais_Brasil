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
    <div class="close-button" onclick="goToIndex()">
        <span>X</span>
    </div>
   <div class="wrapper">>
        <span class="bg-animate"></span>
        <span class="bg-animate2"></span>
        <div class="form-box login">
            <h2 class="animation" style="--i:0; --j:21">Login</h2>
            <form action="#">
                <div class="input-box animation" style="--i:1; --j:22">
                    <input type="text" required>
                    <label>CPF</label>
                    <i class="bi bi-person-vcard"></i>
                </div>
                <div class="input-box animation" style="--i:2; --j:23">
                    <input type="password" id="password" required>
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
            <form action="#">
                <div class="input-box animation"style="--i:18; --j:0">
                    <input type="text" required>
                    <label>Nome</label>
                    <i class="bi bi-person"></i>
                </div>
                <div class="input-box animation" style="--i:19; --j:1">
                    <input type="text" required>
                    <label>CPF</label>
                    <i class="bi bi-person-vcard"></i>
                </div>
                <div class="input-box animation"style="--i:20; --j:2">
                    <input type="text" required>
                    <label>E-mail</label>
                    <i class="bi bi-envelope-fill"></i>
                </div>
                <div class="input-box animation" style="--i:21; --j:3">
                    <input type="password" id="password2" required>
                    <i class="bi bi-eye-fill" id="btn-senha2" onclick="mostrarsenha2()"></i>
                    <label>Senha</label>
                </div>                                           
                <div class="input-box animation"style="--i:22; --j:4">
                    <input type="text" required>
                    <label>Telefone</label>
                    <i class="bi bi-telephone-outbound"></i>
                </div>
                <button type="submit" class="btn animation"style="--i:23; --j:5">Salvar</button>
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