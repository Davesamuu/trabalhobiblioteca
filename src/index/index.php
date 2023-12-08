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
    $emprestimosController = new EmprestimosController($pdo);


    $livros = $livrosController->listarLivros();

    $idlivro = isset($_POST['id_livro']);
    $nome = isset($_POST['nome']);

    if (isset($_POST['id_livro']) && isset($_POST['nome'])  ) {
        $livroID = $_POST['id_livro'];
        $livroNome = $_POST['nome'];
        $usuarioNome = $_SESSION['nome'];
        $usuarioID = $_SESSION['id'];
        $dataEmprestimo = date("Y.m.d");

        $emprestimosController->criarEmprestimos($livroID, $usuarioID, $dataEmprestimo);
    }


  
    ?>
    <div class="container">
        <div class=esquerda></div>
        <div class=direita></div>
    </div>
    <div class="content">
        <nav>
            <ul>
                <li>👤
                    <?php echo $result[0]['nome']; ?>
                </li>
                <li><a href="index.php">📚 Livro</a></li>
                <li><a href="emprestimos.php">🛒 Emprestimos</a></li>
                <li ><a href ="login.php">⬅ Sair</a></li>
                <?php if ($_SESSION["permissao"] == '1') {
                    echo " <li ><a href ='adm.php'>adm do site</a></li>";
                } ?>
        </nav>
        <div class="title">
            <h1>Paginas de Livros</h1>

            <section class="livros-container">
                <?php foreach ($livros as $livro): ?>

                    <div class="livro-1">
                        <div class="livro-img">
                            <img src="<?php echo $livro['imagem']; ?>">
                        </div>
                        <div class="livro-nome">
                            <h3>
                                <?php echo $livro['nome']; ?><br><span class="livro-preco">
                                    <?php echo 'Categoria- ' . ($livro['categoria']); ?>
                                </span>
                            </h3>
                        </div>
                        <div class="livro-button">
                            <form method="post">
                                <input type="hidden" name="id_livro" value="<?php echo $livro['livro_id']; ?>">
                                <input type="hidden" name="nome" value="<?php echo $livro['nome']; ?>">
                                <div class="botao-emprestar"><button type="submit" name="emprestar">Emprestar</button></div>
                            </form>
                        </div>
                    </div>

                <?php endforeach; ?>
            </section>

        </div>
    </div>
</body>

</html>