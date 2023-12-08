<?php
class LoginModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function criarLogin($nome, $email, $senha) {
        $sql = "INSERT INTO usuarios (nome, email, senha) 
        VALUES (?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$nome, $email, $senha]);
    }

    public function listarLogins() {
        $sql = "SELECT * FROM usuarios";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function listarLoginUsuario($id_usuario) {
        $sql = "SELECT * FROM usuarios WHERE id_usuario = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id_usuario]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);   
    }
    
    public function atualizarLogin($id_usuario, $nome, $email, $senha) {
        $sql = "UPDATE usuarios SET nome = ?, email = ?, senha = ? WHERE id_usuario = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$nome, $email, $senha, $id_usuario]);
    }
    
    public function excluirLogin($id_usuario) {
        $sql = "DELETE FROM usuarios WHERE id_usuario = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id_usuario]);
    }
}
?>