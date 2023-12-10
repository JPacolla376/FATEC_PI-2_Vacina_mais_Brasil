<?php
require_once("../PHP/usuario.php");

$user = new Usuario();

$nvsenha = isset($_POST['nvsenha']) ? $_POST['nvsenha'] : "";
$confirmsenha = isset($_POST['confirmsenha']) ? $_POST['confirmsenha'] : "";
$cpf = isset($_POST['cpf']) ? $_POST['cpf'] : "";

if ($nvsenha == $confirmsenha && !empty($nvsenha) && !empty($confirmsenha)) {
    $user->atualizarSenha($cpf, $nvsenha);
    header("location: login.php");
}
?>
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
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="input-box animation">
                    <input type="text" name="cpf" required>
                    <label>CPF</label>
                    <i class="bi bi-person-vcard"></i>
                </div>
                <div class="input-box2 animation">
                    <input type="password" id="password" name="nvsenha" required>
                    <i class="bi bi-eye-fill" id="btn-senha" onclick="mostrarsenha()"></i>
                    <label>Nova senha</label>
                </div>  
                <div class="input-box3 animation">
                    <input type="password" id="password3" name="confirmsenha" required>
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
            <h2 class="animation">Recupere sua Senha</h2>
            <p class="animation">digite a nova senha aqui</p>
        </div>
   </div>
   <script src="../JAVASCRIPT/recuperacao.js"></script>
</body>
</html>
