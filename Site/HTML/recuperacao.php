<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperação de Senha</title>
    <link rel="stylesheet" href="../CSS/recuperacao.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body>
    <div class="close-button" onclick="goToIndex()">
        <span>X</span>
    </div>
   <div class="wrapper">
        <span class="bg-animate"></span>
        <span class="bg-animate2"></span>
        <div class="form-box login">
            <h2 class="animation">Recuperação</h2>
            <form action="#">
                <div class="input-box animation">
                    <input type="text" required>
                    <label>CPF</label>
                    <i class="bi bi-person-vcard"></i>
                </div>
                <div class="input-box animation">
                    <input type="text" required>
                    <label>E-mail</label>
                    <i class="bi bi-envelope-fill"></i>
                </div>
                <div class="input-box2 animation">
                    <input type="password" id="password" required>
                    <i class="bi bi-eye-fill" id="btn-senha" onclick="mostrarsenha()"></i>
                    <label>Nova senha</label>
                </div>  
                <div class="input-box3 animation">
                    <input type="password" id="password3" required>
                    <i class="bi bi-eye-fill" id="btn-senha3" onclick="mostrarsenha3()"></i>
                    <label>Confirme a senha</label>
                </div>              
                <button type="submit" class="btn animation">Salvar</button>
                <div class="logreg-link animation">
                    <p>Volte para a tela de login <a href="../HTML/login.php" class="register-link">Clique aqui</a></p>
                </div>
            </form>
        </div>
        <div class="info-text login">
            <h2 class="animation">Seja Bem Vindo!</h2>
            <p class="animation">Escreva aqui algum texto!!! </p>
        </div>
   </div>
   <script src="../JAVASCRIPT/recuperacao.js"></script>
</body>
</html>
