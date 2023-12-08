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
    <?php
    $usuario = new LoginController($pdo);
    $result = $usuario->listarLoginUsuario($_SESSION['id']);
    $stmt = $pdo->query('SELECT * FROM livros');
    $livros = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $livrosController = new livrosController($pdo);
    


    ?>
    <div class="container">
        <div class=esquerda></div>
        <div class=direita></div>
    </div>
    <div class="content">
        <nav style=" height: 1100px;">
            <ul>
                <li>👤
                    <?php echo $result[0]['nome']; ?>
                </li>
                <li><a href="index.php">📚 Livro</a></li>
                <li><a href="emprestimos.php">🛒 Emprestimos</a></li>
                <li ><a href ="login.php">Sair</a></li>
                <?php if ($_SESSION["permissao"] == '1') {
                    echo " <li ><a href ='adm.php'>adm do site</a></li>";
                } ?>
        </nav>

        
    <div class="title">
      <?php

    echo $result[0]['nome'] . " esta emprestando o livro $nome de id " . $idlivro;
    ?>
    </div>


    </div>


    


</body>

</html>