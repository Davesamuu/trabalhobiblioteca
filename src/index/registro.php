<?php
require_once 'C:\xampp\htdocs\biblioteca-virtual\src\config\config.php';
require_once 'C:\xampp\htdocs\biblioteca-virtual\src\index\app\Controllers\LoginController.php';

$loginController = new LoginController($pdo);
$error = '';
$successMessage = '';

if (isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['senha'])) {
    // Verificar se já existe um usuário com as mesmas informações
    $stmt = $pdo->prepare('SELECT COUNT(*) FROM usuarios WHERE nome = ? AND senha = ?');
    $stmt->execute([$_POST['nome'], $_POST['senha']]);
    $count = $stmt->fetchColumn();

    if ($count > 0) {
        $error = 'Já existe um usuário com essas informações.';
    } else {
        // Se não houver erro, proceder com a criação do login
        $loginController->criarLogin($_POST['nome'], $_POST['email'], $_POST['senha']);
        $successMessage = 'Registro realizado com sucesso!';
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
	
</head>
<body>
<?php
    if ($error) {
        echo '<div style="color: red;">' . $error . '</div>';
    }

    if ($successMessage) {
        echo '<div style="color: green;">' . $successMessage . '</div>';
    }
    ?>
	<?php
                    if(isset($_SESSION['nao_autenticado'])):
                    ?>
                      
                    <?php
                    endif;
                    unset($_SESSION['nao_autenticado']);
                    ?>
                    
                    

	<form  method="POST">
	<h2>Registre-se</h2>
	<input type="text" name="nome" placeholder="Nome" required>         
	<input type="email" name="email" placeholder="E-mail" required>
	<input type="password" name="senha" placeholder="Senha" required>
	<button>			
	Registrar		
	</button>					
							
	<a href="login.php">					
	Logue na sua conta				
	</a>
	</form>	
	
	
</body>

</html>