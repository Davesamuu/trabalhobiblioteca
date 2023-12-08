<?php
session_start()
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="public/css/style.css">

	
</head>
<body>

	<?php
                    if(isset($_SESSION['nao_autenticado'])):
                    ?>
                    <?php
                    endif;
                    unset($_SESSION['nao_autenticado']);
                    ?>
	<form action="loginconfig.php" method="POST">
	
	<h2>Login</h2>
   
	<input type="text" name="nome" placeholder="Usuário">
	<input type="password" name="senha" placeholder="Senha">
	<?php
    if (isset($_SESSION['senha_incorreta'])) {
        echo "<h2 class='error-message'>Usuário ou Senha incorretos</h2>";
        unset($_SESSION['senha_incorreta']);
    }
    ?>					
	<button type="submit">
	Login
	</button>
	<a href="registro.php">
	Crie sua conta
	</a>				
</form>	

	
					
			

</body>
</html>