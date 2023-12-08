<?php
session_start();
include '../config/config.php';

if(empty($_POST['nome']) || empty($_POST['senha'])) {
    $_SESSION['nao_autenticado'] = true;
    header('Location: registro.php');
    exit();
}

$usuario = $_POST['nome'];
$senha = $_POST['senha'];

try {
    $query = "SELECT * FROM usuarios WHERE nome = :usuario AND senha = :senha";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':usuario', $usuario);
    $stmt->bindParam(':senha', $senha);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if($user) {
        $_SESSION['nome'] = $usuario;
        $_SESSION['id'] = $user['id_usuario'];
        $_SESSION['permissao'] = $user['permissao'];
        header('Location: index.php');
        exit();
    } else {
        $_SESSION['senha_incorreta'] = true; // Adicionando a mensagem de senha incorreta
        header('Location: login.php');
        exit();
    }
} catch(PDOException $e) {
    echo "Erro: " . $e->getMessage();
}
?>
