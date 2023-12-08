<?php
session_start();
require_once 'C:/xampp/htdocs/biblioteca-virtual/src/config/config.php';
require_once 'C:/xampp/htdocs/biblioteca-virtual/src/index/app/Controllers/LoginController.php';
require_once 'C:/xampp/htdocs/biblioteca-virtual/src/index/app/Controllers/LivrosController.php';
require_once 'C:/xampp/htdocs/biblioteca-virtual/src/index/app/Controllers/emprestimosController.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="public/css/estilo.css">
</head>
<body>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }

    .direita2 {
        max-width: 800px;
        margin: 20px auto;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1, h2 {
        color: #333;
    }

    form {
        margin-bottom: 20px;
    }

    input, select, button {
        margin-bottom: 10px;
        padding: 8px;
        width: 100%;
        box-sizing: border-box;
    }

    button {
        background-color: #4caf50;
        color: #fff;
        cursor: pointer;
    }

    button:hover {
        background-color: #45a049;
    }

    select {
        padding: 10px;
    }

    /* Add more styles as needed */
</style>

    
    <?php
    $usuario = new LoginController($pdo);
    $result = $usuario->listarLoginUsuario($_SESSION['id']);
    $stmt = $pdo->query('SELECT * FROM livros');
    $livros = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $livrosController = new livrosController($pdo);
    $emprestimosController = new emprestimosController($pdo);


    $livros = $livrosController->listarLivros();
    
    ?>
    <div class="container"><div class=esquerda></div><div class=direita></div></div>
    <div class="content">
    <nav style=" height: 1100px;"> <ul>
    <li>👤 <?php echo $result[0]['nome']; ?></li>
           <li ><a href ="index.php">📚 Livro</a></li>
           <li ><a href ="emprestimos.php">🛒 Emprestimos</a></li>
           <li ><a href ="login.php">⬅ Sair</a></li>
           <?php if ($_SESSION["permissao"] == '1') {
                            echo " <li ><a href ='adm.php'>adm do site</a></li>";
                        } ?>
    </nav>

<?php
    $emprestimosController->exibirListaEmprestimosPorID($_SESSION['id']);
     ?> 
</div>
              </div>
</body>
</html>