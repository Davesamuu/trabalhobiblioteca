<?php

session_start();
require_once 'C:\xampp\htdocs\biblioteca-virtual\src\config\config.php';
require_once 'C:\xampp\htdocs\biblioteca-virtual\src\index\app\Controllers\LoginController.php';

$loginController = new LoginController($pdo);
$error = '';
$successMessage = '';

if (isset($_POST['email'])) {
    // Verificar se já existe um usuário com as mesmas informações
    $stmt = $pdo->prepare('SELECT COUNT(*) FROM usuarios WHERE email = ?');
    $stmt->execute([$_POST['email']]);
    $count = $stmt->fetchColumn();

    if ($count > 0) {
        $error = 'Já existe um usuário com essas informações.';
        $_SESSION['error'] = $error;
    } else {
        // Se não houver erro, proceder com a criação do login
        $loginController->criarLogin($_POST['nome'], $_POST['email'], $_POST['senha']);
        $successMessage = 'Registro realizado com sucesso!';
        echo $successMessage;
    }
}
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>registro</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="public/assets/img/letter-b.png" type="image/x-icon">
    <link rel="stylesheet" href="public/css/style.css">
    <script src="public/js/script.js"></script>

</head>

<body>
    <?php




    if (isset($_SESSION['nao_autenticado'])):
        ?>

        <?php
    endif;
    unset($_SESSION['nao_autenticado']);
    ?>

    <div class="principal">
        <div class="esquerda">

            <div class="risco">
                <div class="image2"><img src="public/assets/img/img2.png"></div>
                <div class="image3"><img src="public/assets/img/img3.png"></div>
                <div class="image"><img src="public/assets/img/img.png"></div>
                <div class="risco-bg"></div>
            </div>
        </div>

        <div class="direita">


            <form id="formularioLogar" action="loginconfig.php" method="POST">

                <h2>Login</h2>

                <input type="text" name="nome" placeholder="Usuário">
                <input type="password" name="senha" placeholder="Senha">
                <?php
                if (isset($_SESSION['senha_incorreta'])) {
                    echo "<script>
                    document.getElementById('formularioLogar').style.display = 'flex';
                    document.getElementById('formularioRegistro').style.display = 'none';</script>";
                    echo "<h2 class='error-message'>Usuário ou Senha incorretos</h2>";
                    unset($_SESSION['senha_incorreta']);
                }

                ?>
                <button type="submit">
                    Login
                </button>
                <a id="botaoRegistrar" href="registro.php">
                    Crie sua conta
                </a>
            </form>


        </div>
    </div>
</body>

</html>